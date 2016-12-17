<?php
if ( ! function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
		exit();
}
?>

<tr valign="top">
	<th scope="row">
		<label for="hseparator"><?php _e( 'Choose the language', 'mpt' ); ?></label>
	</th>
	<td>
		<select name="MPT_plugin_settings[google_scraping][search_country]" >
			<?php
				$selected = $options['google_scraping']['search_country'];
				$country_choose = array(
					__( 'English (default)', 'mpt' )     => 'en',
					__( 'Afrikaans', 'mpt' )             => 'af',
					__( 'Afrikaans', 'mpt' )             => 'af',
					__( 'Albanian', 'mpt' )              => 'sq',
					__( 'Amharic', 'mpt' )               => 'sm',
					__( 'Arabic', 'mpt' )                => 'ar',
					__( 'Azerbaijani', 'mpt' )           => 'az',
					__( 'Basque', 'mpt' )                => 'eu',
					__( 'Belarusian', 'mpt' )            => 'be',
					__( 'Bengali', 'mpt' )               => 'bn',
					__( 'Bihari', 'mpt' )                => 'bh',
					__( 'Bosnian', 'mpt' )               => 'bs',
					__( 'Bulgarian', 'mpt' )             => 'bg',
					__( 'Catalan', 'mpt' )               => 'ca',
					__( 'Chinese (Simplified)', 'mpt' )  => 'zh-CN',
					__( 'Chinese (Traditional)', 'mpt' ) => 'zh-TW',
					__( 'Croatian', 'mpt' )              => 'hr',
					__( 'Czech', 'mpt' )                 => 'cs',
					__( 'Danish', 'mpt' )                => 'da',
					__( 'Dutch', 'mpt' )                 => 'nl',
					__( 'English', 'mpt' )               => 'en',
					__( 'Esperanto', 'mpt' )             => 'eo',
					__( 'Estonian', 'mpt' )              => 'et',
					__( 'Faroese', 'mpt' )               => 'fo',
					__( 'Finnish', 'mpt' )               => 'fi',
					__( 'French', 'mpt' )                => 'fr',
					__( 'Frisian', 'mpt' )               => 'fy',
					__( 'Galician', 'mpt' )              => 'gl',
					__( 'Georgian', 'mpt' )              => 'ka',
					__( 'German', 'mpt' )                => 'de',
					__( 'Greek', 'mpt' )                 => 'el',
					__( 'Gujarati', 'mpt' )              => 'gu',
					__( 'Hebrew', 'mpt' )                => 'iw',
					__( 'Hindi', 'mpt' )                 => 'hi',
					__( 'Hungarian', 'mpt' )             => 'hu',
					__( 'Icelandic', 'mpt' )             => 'is',
					__( 'Indonesian', 'mpt' )            => 'id',
					__( 'Interlingua', 'mpt' )           => 'ia',
					__( 'Irish', 'mpt' )                 => 'ga',
					__( 'Italian', 'mpt' )               => 'it',
					__( 'Japanese', 'mpt' )              => 'ja',
					__( 'Javanese', 'mpt' )              => 'jw',
					__( 'Kannada', 'mpt' )               => 'kn',
					__( 'Korean', 'mpt' )                => 'ko',
					__( 'Latin', 'mpt' )                 => 'la',
					__( 'Latvian', 'mpt' )               => 'lv',
					__( 'Lithuanian', 'mpt' )            => 'lt',
					__( 'Macedonian', 'mpt' )            => 'mk',
					__( 'Malay', 'mpt' )                 => 'ms',
					__( 'Malayam', 'mpt' )               => 'ml',
					__( 'Maltese', 'mpt' )               => 'mt',
					__( 'Marathi', 'mpt' )               => 'mr',
					__( 'Nepali', 'mpt' )                => 'ne',
					__( 'Norwegian', 'mpt' )             => 'no',
					__( 'Norwegian (Nynorsk)', 'mpt' )   => 'nn',
					__( 'Occitan', 'mpt' )               => 'oc',
					__( 'Persian', 'mpt' )               => 'fa',
					__( 'Polish', 'mpt' )                => 'pl',
					__( 'Portuguese (Brazil)', 'mpt' )   => 'pt-BR',
					__( 'Portuguese (Portugal)', 'mpt' ) => 'pt-PT',
					__( 'Punjabi', 'mpt' )               => 'pa',
					__( 'Romanian', 'mpt' )              => 'ro',
					__( 'Russian', 'mpt' )               => 'ru',
					__( 'Scots Gaelic', 'mpt' )          => 'gd',
					__( 'Serbian', 'mpt' )               => 'sr',
					__( 'Sinhalese', 'mpt' )             => 'si',
					__( 'Slovak', 'mpt' )                => 'sk',
					__( 'Slovenian', 'mpt' )             => 'sl',
					__( 'Spanish', 'mpt' )               => 'es',
					__( 'Sudanese', 'mpt' )              => 'su',
					__( 'Swahili', 'mpt' )               => 'sw',
					__( 'Swedish', 'mpt' )               => 'sv',
					__( 'Tagalog', 'mpt' )               => 'tl',
					__( 'Tamil', 'mpt' )                 => 'ta',
					__( 'Telugu', 'mpt' )                => 'te',
					__( 'Thai', 'mpt' )                  => 'th',
					__( 'Tigrinya', 'mpt' )              => 'ti',
					__( 'Turkish', 'mpt' )               => 'tr',
					__( 'Ukrainian', 'mpt' )             => 'uk',
					__( 'Urdu', 'mpt' )                  => 'ur',
					__( 'Uzbek', 'mpt' )                 => 'uz',
					__( 'Vietnamese', 'mpt' )            => 'vi',
					__( 'Welsh', 'mpt' )                 => 'cy',
					__( 'Xhosa', 'mpt' )                 => 'xh',
					__( 'Zulu', 'mpt' )                  => 'zu',
				);
				//ksort( $country_choose );
				
				foreach( $country_choose as $name_country => $code_country ) {
					$choose = ( $selected == $code_country) ? 'selected="selected"': '';
					echo '<option '. $choose .' value="'. $code_country .'">'. $name_country .'</option>';
				}
			?>
		</select>
	</td>
</tr>

<tr valign="top">
	<th scope="row">
		<label for="hseparator"><?php _e( 'Specified color predominantly', 'mpt' ); ?></label>
	</th>
	<td>
		<select name="MPT_plugin_settings[google_scraping][img_color]" >
			<?php
			$selected = $options['google_scraping']['img_color'];
			
			$img_color = array(
				__( '-- Default --', 'mpt' ) => '',
				__( 'Black', 'mpt' )         => 'black',
				__( 'Blue', 'mpt' )          => 'blue',
				__( 'Brown', 'mpt' )         => 'brown',
				__( 'Gray', 'mpt' )          => 'gray',
				__( 'Green', 'mpt' )         => 'green',
				__( 'Pink', 'mpt' )          => 'pink',
				__( 'Purple', 'mpt' )        => 'purple',
				__( 'Teal', 'mpt' )          => 'teal',
				__( 'White', 'mpt' )         => 'white',
				__( 'Yellow', 'mpt' )        => 'yellow',
			);
			ksort( $img_color );

			foreach( $img_color as $name_color => $code_color ) {
				$choose=($selected == $code_color)?'selected="selected"': '';
				echo '<option '. $choose .' value="'. $code_color .'">'. $name_color .'</option>';
			}
			?>
		</select>
		<br/>
		<p class="description">
			<i><?php _e( 'Experimental', 'mpt' ); ?></i> -
			<?php _e( 'Restricts results to images that contain a specified color predominantly', 'mpt' ); ?>
		</p>
	</td>
</tr>

<tr valign="top">
	<th scope="row">
		<label for="hseparator"><?php _e( 'Rights', 'mpt' ); ?></label>
	</th>
	<td>
		<p class="description">
			<?php _e( 'Choose these options can reduce relevance of results, but permit to use free-to-use images.', 'mpt' ); ?>
		</p>
		<select name="MPT_plugin_settings[google_scraping][rights]" >
			<?php
			$selected = $options['google_scraping']['rights'];
			
			$rights = array(
				__( 'Not filtered by license (default)', 'mpt' )                 => '',
				__( 'Labeled for reuse with modification', 'mpt' )               => 'fmc',
				__( 'Labeled for reuse', 'mpt' )                                 => 'fc',
				__( 'Labeled for noncommercial reuse with modification', 'mpt' ) => 'fm',
				__( 'Labeled for noncommercial reuse', 'mpt' )                   => 'f',
			);

			foreach( $rights as $name_rights => $code_rights ) {
				$choose = ( $selected == $code_rights ) ? 'selected="selected"' : '';
				echo '<option '. $choose .' value="'. $code_rights .'">'. $name_rights .'</option>';
			}
			?>
		</select>
	</td>
</tr>

<tr valign="top">
	<th scope="row">
		<label for="hseparator"><?php _e( 'Image size', 'mpt' ); ?></label>
	</th>
	<td>
		<select name="MPT_plugin_settings[google_scraping][imgsz]" >
			<?php
			$selected = $options['google_scraping']['imgsz'];
			
			$imgsz = array(
				__( '-- Default --', 'mpt' ) => '',
				__( 'icon', 'mpt' )          => 'i',
				__( 'medium', 'mpt' )        => 'm',
				__( 'large', 'mpt' )         => 'l',
			);

			foreach( $imgsz as $name_imgsz => $code_imgsz ) {
				$choose=($selected == $code_imgsz)?'selected="selected"': '';
				echo '<option '. $choose .' value="'. $code_imgsz .'">'. $name_imgsz .'</option>';
			}
			?>
		</select>
	</td>
</tr>


<tr valign="top">
	<th scope="row">
		<label for="hseparator"><?php _e( 'Image Type', 'mpt' ); ?></label>
	</th>
	<td>
		<select name="MPT_plugin_settings[google_scraping][imgtype]" >
			<?php
			$selected = $options['google_scraping']['imgtype'];
			
			$imgtype = array(
				__( '-- Default --', 'mpt' ) => '',
				__( 'Face', 'mpt' )          => 'face',
				__( 'Photo', 'mpt' )         => 'photo',
				__( 'Clipart', 'mpt' )       => 'clipart',
				__( 'Lineart', 'mpt' )       => 'lineart',
				__( 'Animated', 'mpt' )      => 'animated',
			);

			foreach( $imgtype as $name_imgtype => $code_imgtype ) {
				$choose=($selected == $code_imgtype)?'selected="selected"': '';
				echo '<option '. $choose .' value="'. $code_imgtype .'">'. $name_imgtype .'</option>';
			}
			?>
		</select>
	</td>
</tr>

<tr valign="top">
	<th scope="row">
		<label for="hseparator"><?php _e( 'Safety level', 'mpt' ); ?></label>
	</th>
	<td>
		<select name="MPT_plugin_settings[google_scraping][safe]" >
			<?php
			$selected = $options['google_scraping']['safe'];
			
			$safe = array(
				__( 'Moderate (default)', 'mpt' ) => 'moderate',
				__( 'Active', 'mpt' )             => 'activate',
				__( 'Off', 'mpt' )                => 'off',
			);

			foreach( $safe as $name_safe => $code_safe ) {
				$choose = ( $selected == $code_safe ) ? 'selected="selected"' : '';
				echo '<option '. $choose .' value="'. $code_safe .'">'. $name_safe .'</option>';
			}
			?>
		</select>
	</td>
</tr>