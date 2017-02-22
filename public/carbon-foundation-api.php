<?php
/**
 * Created by PhpStorm.
 * User: Mario
 * Date: 2/18/2017
 * Time: 7:18 PM
 */



class CarbonFoundationAPI {
    private $fields = array();
	private $id = "";


	public function __construct( $id = null, $fields = null ) {
		//add_action( 'genesis_entry_content', array( $this, 'single_product_template' ) );
		if ( $id ) {
			$this->set_the_id( $id );
		}
		if ( $fields ) {
			$this->set_carbon_fields( $fields );
		}
	}

	private function set_carbon_fields( $fields ) {
	    foreach ( $fields as $field ) {
	        $this->fields[$field] = carbon_get_post_meta( $this->get_the_ID(), $field );
	        if ( "" === $this->fields[$field] ) {
	        	$this->fields[$field] = carbon_get_post_meta( $this->get_the_ID(), $field, 'complex' );
	        }
        }
    }

	private function set_the_ID( $id ) {
	    if ( is_numeric( $id ) ) {
	        $this->id = $id;
        }
    }

    public function get_the_ID() {
	    return $this->id;
    }

    public static function row_open( $args = null ) {
	    if ($args) {
	        echo "<div class=\"row {$args}\">";
        }
        else {
	        echo '<div class="row">';
        }
    }

	public static function column_open( $args = null ) {
		if ($args) {
			echo "<div class=\"column {$args}\">";
		}
		else {
			echo '<div class="column">';
		}
	}

	public static function close() {
	     echo '</div>';
    }

    public static function column( $output, $args = null ) {
	    self::column_open( $args );
	        echo $output;
        self::close();

    }

    public static function columns( $output, $args = null, $number = null ) {
	    for ( $i = 0; $i < $number; $i++ ) {
	        self::column( $output, $args );
        }
    }

	public static function row( $output, $args = null) {
		self::row_open( $args );
		    echo $output;
		self::close();

	}

	public function title( $field, $args = null ) {
		$defaults = array(
			'column_classes'    =>  'column',
			'row_classes'   =>  'row'
		);
		$meta_args = wp_parse_args( $args, $defaults );
		$title = '<h1>' . __( $this->fields[ $field ], 'carbon-foundation-api' ) . '</h1>';

		self::row_open( $meta_args['row_classes'] );
			self::column( $title, $meta_args['column_classes'] );
        self::close();
	}


	/*
	 * The game plan for image_gallery is to create a command that will turn a complex field into an image gallery.
	 * The total number of fields will need to be calculated, and the grid of images will need to be adjusted accordingly.
	 * For now, let's just get four images onto the page
	 */
	public function image_gallery( $field, $size = 'thumbnail', $args= null ) {
		$count = count( $this->fields[$field] );
		self::row_open( 'large-up-2' );
			foreach ( $this->fields[$field] as $imageID ) {
				$image = wp_get_attachment_image( $imageID['herbal_image'], $size, false, $args );
				self::column( $image );
			}
		self::close();
	}

	public function dump_fields() {
	    var_dump_pre( $this->fields );
}

}