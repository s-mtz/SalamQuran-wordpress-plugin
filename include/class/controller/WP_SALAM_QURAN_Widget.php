<?php

class Salam_Quran_Widget extends WP_Widget
{

    public function __construct()
    {
        $widget_ops = array('classname' => 'My_Aye', 'description' => 'Displays a Aye!');
        $this->WP_Widget('My_Aye', 'My Aye', $widget_ops);
    }

    // Display the widget
    function widget($args, $instance)
    {
        // PART 1: Extracting the arguments + getting the values
        extract($args, EXTR_SKIP);
        $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
        $Aye = empty($instance['Aye']) ? '' : $instance['Aye'];

        // Before widget code, if any
        echo (isset($before_widget) ? $before_widget : '');

        // PART 2: The title and the text output
        if (!empty($title))
            echo $before_title . $title . $after_title;;
        if (!empty($Aye))
            echo $Aye;

        // After widget code, if any  
        echo (isset($after_widget) ? $after_widget : '');
    }


    // The widget form (for the backend )
    public function form($instance)
    {

        // PART 1: Extract the data from the instance variable
        $instance = wp_parse_args((array) $instance, array('title' => ''));
        $title = $instance['title'];
        $Aye = $instance['Aye'];

        // PART 2-3: Display the fields
?>
        <!-- PART 2: Widget Title field START -->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
            </label>
        </p>
        <!-- Widget Title field END -->

        <!-- PART 3: Widget Aye field START -->
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>">Aye:
                <select class='widefat' id="<?php echo $this->get_field_id('Aye'); ?>" name="<?php echo $this->get_field_name('Aye'); ?>" type="text">
                    <option value="<?php do_shortcode('[aye_rand]') ?>" <?php echo ($Aye == do_shortcode('[aye_rand]')) ? 'selected' : ''; ?>>
                        Aye Random
                    </option>
                    <option value="<?php do_shortcode('[aye_rooz]') ?>" <?php echo ($Aye == do_shortcode('[aye_rooz]')) ? 'selected' : ''; ?>>
                        Aye Rooz
                    </option>
                </select>
            </label>
        </p>
        <!-- Widget Aye field END -->
<?php

    }

    // Update widget settings
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['Aye'] = $new_instance['Aye'];
        return $instance;
    }
} // class Salam_Quran_Widget