<?php
/*
Plugin Name: Snapycode Gmap 
Plugin URI: http://snapycode.com 
Description: Google map widget for wordpress by Snapycode
Author: SnapyCode 
Author URI: http://snapycode.com 
Version: 1.0 
*/

class SnapycodeGmap extends WP_Widget {

	public function __construct() {
		// Instantiate the parent object
		parent::__construct(
			'snapycode_gmap', // Base ID
			__('Snapycode Gmap', 'text_domain'), // Name
			array( 'description' => __( 'Snapycode Google map for wordpress', 'text_domain' ), ) // Args
		);
	}
	
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		
		if ( !session_id() )
		add_action( 'init', 'session_start' );		
		
		echo $args['before_widget'];  
		include "map.php";
		echo $args['after_widget'];
		
	}
	
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		// Output admin widget options form
		
		if ( isset( $instance[ 'snapycode_gmap_map_title' ] ) ) { $snapycode_gmap_map_title = $instance[ 'snapycode_gmap_map_title' ]; } 
		else { $snapycode_gmap_map_title = __( 'Snapycode Google Map Widget', 'text_domain' ); }
		
		if ( isset( $instance[ 'snapycode_gmap_map_header' ] ) ) { $map_header = $instance[ 'snapycode_gmap_map_header' ]; } 
		else { $map_header = __( '', 'text_domain' ); }
		
		if ( isset( $instance[ 'snapycode_gmap_map_footer' ] ) ) { $map_footer = $instance[ 'snapycode_gmap_map_footer' ]; } 
		else { $map_footer = __( '', 'text_domain' ); }
		
		if ( isset( $instance[ 'snapycode_gmap_map_address' ] ) ) { $map_address = $instance[ 'snapycode_gmap_map_address' ]; } 
		else { $map_address = __( 'kolkata,W.B,India', 'text_domain' ); }
		
		if ( isset( $instance[ 'snapycode_gmap_map_zoom' ] ) ) { $map_zoom = $instance[ 'snapycode_gmap_map_zoom' ]; } 
		else { $map_zoom = __( '1', 'text_domain' ); }
		
		if ( isset( $instance[ 'snapycode_gmap_map_type' ] ) ) { $map_type = $instance[ 'snapycode_gmap_map_type' ]; } 
		else { $map_type = __( 'ROADMAP', 'text_domain' ); }
		
		if ( isset( $instance[ 'snapycode_gmap_map_enable_bubble' ] ) ) { $map_enable_bubble = $instance[ 'snapycode_gmap_map_enable_bubble' ]; } 
		else { $map_enable_bubble = __( '1', 'text_domain' ); }
		
		if ( isset( $instance[ 'snapycode_gmap_map_enable_direction' ] ) ) { $map_enable_direction = $instance[ 'snapycode_gmap_map_enable_direction' ]; } 
		else { $map_enable_direction = __( '0', 'text_domain' ); }
		
		if ( isset( $instance[ 'snapycode_gmap_map_marker' ] ) ) { $map_marker = $instance[ 'snapycode_gmap_map_marker' ]; } 
		else { $map_marker = __( '0', 'text_domain' ); }
		
		if ( isset( $instance[ 'snapycode_gmap_map_width' ] ) ) { $map_width = $instance[ 'snapycode_gmap_map_width' ]; } 
		else { $map_width = __( '250', 'text_domain' ); }
		
		if ( isset( $instance[ 'snapycode_gmap_map_height' ] ) ) { $map_height = $instance[ 'snapycode_gmap_map_height' ]; } 
		else { $map_height = __( '300', 'text_domain' ); }
		?>
        
		<p>
		<label for="<?php echo $this->get_field_id( 'snapycode_gmap_map_title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'snapycode_gmap_map_title' ); ?>" 
        name="<?php echo $this->get_field_name( 'snapycode_gmap_map_title' ); ?>" type="text" value="<?php echo esc_attr( $snapycode_gmap_map_title ); ?>">
		</p>
        
        <p>
        <label for="<?php echo $this->get_field_id( 'snapycode_gmap_map_header' ); ?>"><?php _e( 'Map header:' ); ?></label> 
        <textarea name="<?php echo $this->get_field_name( 'snapycode_gmap_map_header' ); ?>" 
        id="<?php echo $this->get_field_id( 'snapycode_gmap_map_header' ); ?>"><?php echo esc_attr( $map_header ); ?></textarea>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id( 'snapycode_gmap_map_footer' ); ?>"><?php _e( 'Map footer:' ); ?></label> 
        <textarea name="<?php echo $this->get_field_name( 'snapycode_gmap_map_footer' ); ?>" 
        id="<?php echo $this->get_field_id( 'snapycode_gmap_map_footer' ); ?>"><?php echo esc_attr( $map_footer ); ?></textarea>
        </p>
        
        <p>
		<label for="<?php echo $this->get_field_id( 'snapycode_gmap_map_address' ); ?>"><?php _e( 'Map Address:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'snapycode_gmap_map_address' ); ?>" 
        name="<?php echo $this->get_field_name( 'snapycode_gmap_map_address' ); ?>" type="text" 
        value="<?php echo esc_attr( $map_address ); ?>">
		</p>
        
        <p>
		<label for="<?php echo $this->get_field_id( 'snapycode_gmap_map_zoom' ); ?>"><?php _e( 'Map zoom level:' ); ?></label> 
		<select name="<?php echo $this->get_field_name( 'snapycode_gmap_map_zoom' ); ?>" id="<?php echo $this->get_field_id( 'snapycode_gmap_map_zoom' ); ?>" 
        class="">
        <?php for($i=1; $i<=20; $i++){
			if($map_zoom==$i){ $selected='selected';}else{ $selected='';}
			echo '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
		} ?>
        </select>
		</p>
        
        <p>
		<label for="<?php echo $this->get_field_id( 'snapycode_gmap_map_type' ); ?>"><?php _e( 'Map type:' ); ?></label> 
		<select name="<?php echo $this->get_field_name( 'snapycode_gmap_map_type' ); ?>" id="<?php echo $this->get_field_id( 'snapycode_gmap_map_type' ); ?>" 
        class="">
            <option <?php if( $map_type=='ROADMAP' ){ echo 'selected'; }?> value="ROADMAP">Roadmap</option>
            <option <?php if( $map_type=='SATELLITE' ){ echo 'selected'; }?> value="SATELLITE">Satellite</option>
            <option <?php if( $map_type=='HYBRID' ){ echo 'selected'; }?> value="HYBRID">Hybrid</option>
            <option <?php if( $map_type=='TERRAIN' ){ echo 'selected'; }?> value="TERRAIN">Terrain</option>
        </select>
		</p>
        
        <p>
		<label for="<?php echo $this->get_field_id( 'snapycode_gmap_map_enable_bubble' ); ?>"><?php _e( 'Enable address bubble:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'snapycode_gmap_map_enable_bubble' ); ?>" 
        name="<?php echo $this->get_field_name( 'snapycode_gmap_map_enable_bubble' ); ?>" type="checkbox" 
        value="1" <?php if( $map_enable_bubble==1 ){ echo 'checked="checked"';} ?>>
		</p>
        
        <p>
		<label for="<?php echo $this->get_field_id( 'snapycode_gmap_map_enable_direction' ); ?>"><?php _e( 'Enable direction:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'snapycode_gmap_map_enable_direction' ); ?>" 
        name="<?php echo $this->get_field_name( 'snapycode_gmap_map_enable_direction' ); ?>" type="checkbox" 
        value="1" <?php if( $map_enable_direction==1 ){ echo 'checked="checked"'; } ?>>
		</p>
        
        <p>
        <?php $marker_icons = $this->snapycode_map_markers(); ?>
		<label for="<?php echo $this->get_field_id( 'snapycode_gmap_map_marker' ); ?>"><?php _e( 'Map Marker:' ); ?></label> 
		<select name="<?php echo $this->get_field_name( 'snapycode_gmap_map_marker' ); ?>" id="<?php echo $this->get_field_id( 'snapycode_gmap_map_marker' ); ?>" 
        class="" onchange="marker_change(this)">
            <?php foreach($marker_icons as $key=>$icon){
				if($map_marker==$icon){ $selected='selected';}else{ $selected='';}
				echo '<option '.$selected.' value="'.$key.'">'.$icon.'</option>';
			} ?>
        </select>
		</p>
        <div class="snapycode_gmap_marker_img">
		<?php if( $map_marker != '0' && $map_marker !=0 ){ echo '<img src="'. $this->plugin_url().'images/map-markers/'.$map_marker .'" />'; }?>
		</div>
        
        <p>
		<label for="<?php echo $this->get_field_id( 'snapycode_gmap_map_width' ); ?>"><?php _e( 'Map Width(PX):' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'snapycode_gmap_map_width' ); ?>" 
        name="<?php echo $this->get_field_name( 'snapycode_gmap_map_width' ); ?>" type="text" 
        value="<?php echo esc_attr( $map_width ); ?>">
		</p>
        
        <p>
		<label for="<?php echo $this->get_field_id( 'snapycode_gmap_map_height' ); ?>"><?php _e( 'Map Height(PX):' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'snapycode_gmap_map_height' ); ?>" 
        name="<?php echo $this->get_field_name( 'snapycode_gmap_map_height' ); ?>" type="text" 
        value="<?php echo esc_attr( $map_height ); ?>">
		</p>
        
        <script type="text/javascript">
		function marker_change(ref){		
			var marker = ref.value;  
			if( marker != 0 ){
				marker = "<?php echo $this->plugin_url(); ?>images/map-markers/"+marker;  
				jQuery(".snapycode_gmap_marker_img").html("<img src=\'"+marker+"\' />");
			}
		}
       </script>
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
	public function update( $new_instance, $old_instance ) {
		// Save widget options
		
		$instance = array();
		$instance['snapycode_gmap_map_title'] = ( ! empty( $new_instance['snapycode_gmap_map_title'] ) ) ? 
		strip_tags( $new_instance['snapycode_gmap_map_title'] ) : '';
		
		$instance['snapycode_gmap_map_header'] = ( ! empty( $new_instance['snapycode_gmap_map_header'] ) ) ? 
		strip_tags( $new_instance['snapycode_gmap_map_header'] ) : '';
		
		$instance['snapycode_gmap_map_footer'] = ( ! empty( $new_instance['snapycode_gmap_map_footer'] ) ) ? 
		strip_tags( $new_instance['snapycode_gmap_map_footer'] ) : '';
		
		$instance['snapycode_gmap_map_address'] = ( ! empty( $new_instance['snapycode_gmap_map_address'] ) ) ? 
		strip_tags( $new_instance['snapycode_gmap_map_address'] ) : '';
		
		$instance['snapycode_gmap_map_zoom'] = ( ! empty( $new_instance['snapycode_gmap_map_zoom'] ) ) ?
		 strip_tags( $new_instance['snapycode_gmap_map_zoom'] ) : '';
		 
		$instance['snapycode_gmap_map_type'] = ( ! empty( $new_instance['snapycode_gmap_map_type'] ) ) ? 
		strip_tags( $new_instance['snapycode_gmap_map_type'] ) : '';
		
		$instance['snapycode_gmap_map_enable_bubble'] = ( ! empty( $new_instance['snapycode_gmap_map_enable_bubble'] ) ) ?
		 strip_tags( $new_instance['snapycode_gmap_map_enable_bubble'] ) : '';
		 
		$instance['snapycode_gmap_map_enable_direction'] = ( ! empty( $new_instance['snapycode_gmap_map_enable_direction'] ) ) ?
		strip_tags( $new_instance['snapycode_gmap_map_enable_direction'] ) : '';
		 
		$instance['snapycode_gmap_map_marker'] = ( ! empty( $new_instance['snapycode_gmap_map_marker'] ) ) ?
		 strip_tags( $new_instance['snapycode_gmap_map_marker'] ) : '';
		 
		$instance['snapycode_gmap_map_width'] = ( ! empty( $new_instance['snapycode_gmap_map_width'] ) ) ?
		 strip_tags( $new_instance['snapycode_gmap_map_width'] ) : '';
		 
		$instance['snapycode_gmap_map_height'] = ( ! empty( $new_instance['snapycode_gmap_map_height'] ) ) ?
		 strip_tags( $new_instance['snapycode_gmap_map_height'] ) : '';
		

		return $instance;
	}
	
	/*
	* Function to return map markers
	*/
	private function snapycode_map_markers()
	{
		$marker_dir = plugin_dir_path( __FILE__ ) .'/images/map-markers/';
		$marker_dir = str_replace("\\","/", $marker_dir);
		$marker_images = glob($marker_dir . '*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}', GLOB_BRACE);
		$marker_images_len = count($marker_images);
		
		if( $marker_images_len > 0 )
		{
			$markers[0]='default';
			foreach( $marker_images as $marker_image )
			{
				$markers[basename($marker_image)] = basename($marker_image);
			}
			
			return $markers;
			
		}else{
			return array();	
		}
			
	}
	
	/**
	* Get the plugin url
	*/
	public function plugin_url() { 
				
		if (is_ssl()) :
			return $this->plugin_url = str_replace('http://', 'https://', WP_PLUGIN_URL) . "/" . plugin_basename( dirname(__FILE__)) . '/'; 
		else :
			return $this->plugin_url = WP_PLUGIN_URL . "/" . plugin_basename( dirname(__FILE__)) . '/'; 
		endif;
	}
}

function snapycode_gmap() {
	register_widget( 'SnapycodeGmap' );
}

add_action( 'widgets_init', 'snapycode_gmap' );
?>