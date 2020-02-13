
<?php 
/***
 * Form content for metabox 
 */
;?>

<div class="hcf_box">
    <style scoped>
        
    </style>
    <p class="meta-options x_field">
        <label for="x_attr_name">Attribution Name</label><br />
        <input  id="x_attr_name" 
                type="text" 
                name="x_attr_name"
                value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'x_attr_name', true ) ); ?>"
                >
    </p>
    <p class="meta-options x_field">
        <label for="x_attr_title">Attribution Title</label><br />
        <input  id="x_attr_title" 
                type="text" 
                name="x_attr_title"
                value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'x_attr_title', true ) ); ?>"
                >

    </p>
</div>