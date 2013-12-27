<?php
/*
Plugin Name: Simple Twitter Feed
Plugin URI: http://aaroncrowder.com/2012/10/simple-twitter-feed/
Description: Display your twitter feed in your sidebar
Author: Aaron Crowder
Version: 0.5.1
Author URI: http://aaroncrowder.com
*/

class SimpleTwitterFeed extends WP_WIDGET
{
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'simpletwitterfeed', // Base ID
            'Simple Twitter Feed', // Name
            array( 'description' => __( 'A Simple Widget to display your twitter feed', 'text_domain' ), ) // Args
        );
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    function form($instance)
    {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'handle' => '', 'tweets' => '', 'cache_time' => '' ) );

        $title = $instance['title'];
        $handle = $instance['handle'];
        $tweets = $instance['tweets'];
        $cache_time = $instance['cache_time'];

        ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">Title: 
                    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('handle'); ?>">Twitter Handle: 
                    <input class="widefat" id="<?php echo $this->get_field_id('handle'); ?>" name="<?php echo $this->get_field_name('handle'); ?>" type="text" value="<?php echo attribute_escape($handle); ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('tweets'); ?>">Tweets to display*:
                    <input class="widefat" id="<?php echo $this->get_field_id('tweets'); ?>" name="<?php echo $this->get_field_name('tweets'); ?>" type="number" value="<?php echo attribute_escape($tweets); ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('cache_time'); ?>">Cache Time (in seconds)*:
                    <input class="widefat" id="<?php echo $this->get_field_id('cache_time'); ?>" name="<?php echo $this->get_field_name('cache_time'); ?>" type="number" value="<?php echo attribute_escape($cache_time); ?>" />
                </label>
            </p>
            <p><small>*must be a number</small></p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['handle'] = strip_tags($new_instance['handle']);

        if(is_numeric($new_instance['tweets'])) {
            $instance['tweets'] = $new_instance['tweets'];
        }

        if(is_numeric($new_instance['cache_time'])) {
            $instance['cache_time'] = $new_instance['cache_time'];
        }

        return $instance;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    function widget($args, $instance)
    {
        extract($args, EXTR_SKIP);

        echo $before_widget;

        $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
        $handle = empty($instance['handle']) ? '' : $instance['handle'];
        $tweets = empty($instance['tweets']) ? '' : $instance['tweets'];
        $cache_time = empty($instance['cache_time']) ? '' : $instance['cache_time'];

        if($title != '') {
            echo $before_title . $this->linkify($title) . $after_title;
        }

        if($handle != '') {
            $feed = $this->getFeed($handle, $cache_time);

            if (is_array($feed) && !empty($feed)): ?>
                <ul>
                    <?php array_splice($feed, $tweets); ?>
                    <?php foreach ($feed as $item): ?>
                    <li><?php echo $this->linkify($item['desc']); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php 
            else: ?>
                <p>There are no tweets to display for this user.</p>
            <?php endif;
        }

        echo $after_widget;
    }

    private function getFeed($handle, $cache_time)
    {
        if(false === ($content = get_transient('simple-twitter-feed-' . $handle) ) ) {
            $data = wp_remote_get('http://api.twitter.com/1/statuses/user_timeline.rss?screen_name=' . strtolower($handle));
            $content = $data['body'];

            if($cache_time > 0) {
                set_transient('simple-twitter-feed-' . $handle, $content, 3600);
            }
        }

        $feed = array();

        $doc = new DOMDocument();
        $doc->loadXML($content);

        foreach ($doc->getElementsByTagName('item') as $node)
        {
            array_push($feed, array
            (
                'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                'desc' => preg_replace('/^\w+:/i','',$node->getElementsByTagName('description')->item(0)->nodeValue),
                'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue
            ));
        }

        return $feed;
    }

    private function linkify($v)
    {
        $v = ' ' . $v;

        $v = make_clickable($v);

        $v = preg_replace('/(^|\s)@(\w+)/', '\1@<a href="http://www.twitter.com/\2">\2</a>', $v);
        $v = preg_replace('/(^|\s)#(\w+)/', '\1#<a href="http://search.twitter.com/search?q=%23\2">\2</a>', $v);
         
        return trim($v);
    }
}

add_action( 'widgets_init', create_function( '', 'register_widget( "simpletwitterfeed" );' ) );
