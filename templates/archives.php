<?php
$post_types = cap_get_post_types();

// Set default opened tab to post post_type
if (!isset($_GET['tab']))
    $_GET['tab'] = reset($post_types);
?>

<div class="wrap">
    <h1><?= esc_html(get_admin_page_title()); ?></h1>

    <?php // Check if the current edited post_type exists
        if (!in_array($_GET['tab'], $post_types)) {
            do_action('cap_admin_notices', $type = 'error', $text = __('The post type you are editing does not appear to exist!', 'custom_archives_plugin'));
            die;
        }

        do_action('cap_admin_notices', $type = 'success', $text = __('You are now editing the archive page for', 'custom_archives_plugin') . ' ' . '<u>' . $_GET['tab'] . '</u>');
    ?>

    <?php do_action('cap_admin_tabs'); ?>

    <?php // Add every post_types to a tab ?>
    <?php do_action('cap_admin_tabs'); ?>

    <?php // Show wysiwyg form ?>
    <form method="post" action="options.php" class="cap-form">
        <?php settings_fields('cap-field-group'); ?>
        <table class="form-table">
            <tr valign="top">
                <?= wp_editor(esc_attr(get_option('cap_wysiwyg_' . $_GET['tab'] . '_archive')), 'terms_wp_content', ['textarea_rows' => 15,
                    'tabindex' => 1,
                    'textarea_name' => 'cap_wysiwyg_' . $_GET['tab'] . '_archive',
                    'drag_drop_upload' => true]); ?>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>