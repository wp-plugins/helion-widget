<?php
/*
	Plugin Name: Helion Widget
	Plugin URI: http://www.blogworkorange.net/helion-widget/
	Description: Widget promujący wybrane książki z księgarni Helion, zintegrowany z programem partnerskim
	Author: Paweł Pela
	Version: 0.94
	Author URI: http://www.paulpela.com
	License: GPL2

	Copyright 2010  Paweł Pela  (email : paulpela@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	
	--------------------------------------------------------------------------
*/


/* Add our function to the widgets_init hook. */
add_action( 'widgets_init', 'helion_load_widget' );

/* Function that registers our widget. */
function helion_load_widget() {
	register_widget( 'Helion_Widget' );
}

class Helion_Widget extends WP_Widget {
	
	function Helion_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'helion', 'description' => 'Widget wyświetlający wybrane książki z księgarni Helion, zintegrowany z programem partnerskim', 'okladka' => '120x156' );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'helion-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'helion-widget', 'Helion Widget', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		//$idents = $instance['ident'];
		$idents_hn = get_option("helion_ksiazki");
		$idents_ss = get_option("sensus_ksiazki");
		$idents_os = get_option("onepress_ksiazki");
		$idents_sm = get_option("septem_ksiazki");
		
		$idents_helion = explode(",", $idents_hn);
		$idents_sensus = explode(",", $idents_ss);
		$idents_onepress = explode(",", $idents_os);
		$idents_septem = explode(",", $idents_sm);
		$uczestnik = $instance['uczestnik'];
		$okladka = $instance['okladka'];
		
		if($idents_hn) {
			foreach($idents_helion as $id) {
				$id_arr[] = array("helion", $id);
			}
		}
		if($idents_ss) {
			foreach($idents_sensus as $id) {
				$id_arr[] = array("sensus", $id);
			}
		}
		
		if($idents_os) {
			foreach($idents_onepress as $id) {
				$id_arr[] = array("onepress", $id);
			}
		}
		
		if($idents_sm) {
			foreach($idents_septem as $id) {
				$id_arr[] = array("septem", $id);
			}
		}
		
		$rand = array_rand($id_arr);
		$ident = $id_arr[$rand];
		
		
		$description = simplexml_load_file("http://" . $ident[0] . ".pl/plugins/new/xml/ksiazka.cgi?ident=" . $ident[1]);
		
		$opis_big = $description->opis;
		$tmp = strstr($opis_big, "<p>");
		$opis_p = strip_tags(strstr($tmp, "</p>"));

		foreach($description->tytul as $t) {
			if($t->attributes()->language == "polski") {
				$k_tytul = $t;
			}
		}
		
		$nowosc = $description->nowosc;
		$bestseller = $description->bestseller;
		
		$nowosc_bestseller = "";
		if($nowosc == 1 || $bestseller == 1) {
			$nowosc_bestseller .= "<p>";
			if($nowosc == 1)
				$nowosc_bestseller .= "<img src=\"http://helion.pl/img/nowosc.gif\" alt=\"Nowość\" /> ";
			if($bestseller == 1)
				$nowosc_bestseller .= "<img src=\"http://helion.pl/img/bestseller.gif\" alt=\"Bestseller\" />";
			$nowosc_bestseller .= "</p>";
		}

		echo $before_widget;
		
		if( $title )
			echo $before_title . $title . $after_title;
			
		?>
		<p><a href="http://<?php echo $ident[0]; ?>.pl/view/<?php echo $uczestnik; ?>/<?php echo $ident[1]; ?>.htm" target="_blank" title="<?php echo $opis_p; ?>"><img src="http://<?php echo $ident[0]; ?>.pl/okladki/<?php echo $okladka; ?>/<?php echo $ident[1]; ?>.jpg" alt="<?php echo $k_tytul; ?>" /></a></p>
		<p><a href="http://<?php echo $ident[0]; ?>.pl/view/<?php echo $uczestnik; ?>/<?php echo $ident[1]; ?>.htm" target="_blank" title="<?php echo $k_tytul; ?>"><?php echo $k_tytul; ?></a></p>
		<p>Cena: <?php echo $description->cena; ?>zł</p>
		<?php 
		echo $nowosc_bestseller;
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['uczestnik'] = strip_tags( $new_instance['uczestnik'] );
		$instance['okladka'] = strip_tags( $new_instance['okladka'] );

		return $instance;
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Polecana książka', 'ident' => 'markwy' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		$selected = ' selected="selected" ';
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Tytuł:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'uczestnik' ); ?>">ID uczestnika:</label>
			<input id="<?php echo $this->get_field_id( 'uczestnik' ); ?>" name="<?php echo $this->get_field_name( 'uczestnik' ); ?>" value="<?php echo $instance['uczestnik']; ?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'okladka' ); ?>">Rozmiar okładki:</label>
			<select id="<?php echo $this->get_field_id( 'okladka' ); ?>" name="<?php echo $this->get_field_name( 'okladka' ); ?>" class="widefat" style="width:100%;">
				<option <?php if($this->get_field_id( 'format' ) == "65x85") echo $selected; ?>>65x85</option>
				<option <?php if($this->get_field_id( 'format' ) == "72x95") echo $selected; ?>>72x95</option>
				<option <?php if($this->get_field_id( 'format' ) == "72x95") echo $selected; ?>>72x95</option>
				<option <?php if($this->get_field_id( 'format' ) == "90x119") echo $selected; ?>>90x119</option>
				<option <?php if($this->get_field_id( 'format' ) == "120x156") echo $selected; ?>>120x156</option>
				<option <?php if($this->get_field_id( 'format' ) == "125x163") echo $selected; ?>>125x163</option>
				<option <?php if($this->get_field_id( 'format' ) == "181x236") echo $selected; ?>>181x236</option>
				<option <?php if($this->get_field_id( 'format' ) == "326x466") echo $selected; ?>>326x466</option>
			</select>
		</p>

		<?php
	}
}

/* ---------------------------------------------------------------------------
	Menu creation code
*/

add_action('admin_menu', 'helionwidget_plugin_menu');

function helionwidget_plugin_menu() {

  add_options_page('Opcje Helion Widgetu', 'Helion Widget', 'manage_options', 'helionwidget-options', 'helionwidget_plugin_options');

}

function helionwidget_plugin_options() {

  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }

	$opt1_name = 'helion_ksiazki';
	$opt2_name = 'sensus_ksiazki';
	$opt3_name = 'onepress_ksiazki';
	$opt4_name = 'septem_ksiazki';
    $hidden_field_name = 'helion_submit_hidden';
    $data_field1_name = 'helion_ksiazki';
    $data_field2_name = 'sensus_ksiazki';
    $data_field3_name = 'onepress_ksiazki';
    $data_field4_name = 'septem_ksiazki';
  
	$opt1_val = get_option( $opt1_name );
	$opt2_val = get_option( $opt2_name );
	$opt3_val = get_option( $opt3_name );
	$opt4_val = get_option( $opt4_name );

	if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt1_val = $_POST[ $data_field1_name ];
        $opt2_val = $_POST[ $data_field2_name ];
        $opt3_val = $_POST[ $data_field3_name ];
        $opt4_val = $_POST[ $data_field4_name ];

        // Save the posted value in the database
        update_option( $opt1_name, $opt1_val );
        update_option( $opt2_name, $opt2_val );
        update_option( $opt3_name, $opt3_val );
        update_option( $opt4_name, $opt4_val );

        // Put an settings updated message on the screen

?>
<div class="updated"><p><strong>Zmiany zostały zapisane.</strong></p></div>
<?php

    }

?>

<div class="wrap">
<h2>Helion Widget</h2>
<p>Tutaj możesz dodawać książki, które będą wyświetlane za pomocą widgetu Helion Widget.</p>
<p>Aby dodać książkę do listy, podaj jej identyfikator (<strong>ident</strong>). Jeżeli chcesz dodać więcej książek, oddziel ich identyfikatory przecinkami bez spacji. Np. <em>markwy,loglov,ajaphp</em>.</p>
<p>Jeśli nie dodasz żadnych książek z którejś z księgarni, zostanie ona pominięta.</p>
<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p>Książki wydawnictwa Helion:</p>
<p>
	<textarea name="<?php echo $data_field1_name; ?>" rows="6" cols="75"><?php echo $opt1_val; ?></textarea>
</p>

<p>Książki wydawnictwa Sensus:</p>
<p>
	<textarea name="<?php echo $data_field2_name; ?>" rows="6" cols="75"><?php echo $opt2_val; ?></textarea>
</p>


<p>Książki wydawnictwa Onepress:</p>
<p>
	<textarea name="<?php echo $data_field3_name; ?>" rows="6" cols="75"><?php echo $opt3_val; ?></textarea>
</p>

<p>Książki wydawnictwa Septem:</p>
<p>
	<textarea name="<?php echo $data_field4_name; ?>" rows="6" cols="75"><?php echo $opt4_val; ?></textarea>
</p>

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="Zapisz" />
</p>

</form>
<hr/>
<h3>Czy ta wtyczka jest pomocna?</h3>

<p>Korzystasz z tej wtyczki i przydaje ci się ona? Zwiększyły się twoje zarobki? Ułatwiłem ci prowadzenie bloga? Jeśli tak, to możesz odwdzięczyć się autorowi i umożliwić mi dalsze rozwijanie tej wtyczki. Możesz zrobić to na trzy sposoby:</p>

<ol>
	<li>Dokonać <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=63SBY4W2R42NW" target="_blank">donacji dowolnej kwoty przez PayPal</a></li>
	<li>Możesz też przesłać kod do iTunes USA o dowolnej wartości na mój adres: <a href="mailto:paulpela@gmail.com?subject=Podziękowanie za Helion Widget"><strong>paulpela@gmail.com</strong></a></li>
	<li>Jeśli kupujesz czasem książki Heliona, to możesz także wyrazić swoją wdzięczność wchodząc na stronę sklepu przez <a href="http://helion.pl/view/4261k" target="_blank">mój link partnerski</a></li>
</ol>

<p>Poza tym, jeśli chcesz nauczyć się programowania WordPress'a lub poszukujesz innych ciekawych wtyczek, zapraszam na <a href="http://www.blogworkorange.net/" target="_blank">mój blog poświęcony tej tematyce</a>.</p>

</div>

<?php

}

// http://justintadlock.com/archives/2009/05/26/the-complete-guide-to-creating-widgets-in-wordpress-28
 ?>