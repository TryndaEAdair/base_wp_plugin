<?php

	class Base_Custom_Test extends WP_UnitTestCase {
		function test_shortcode_output() {
			$output = base_custom_shortcode();
			$this->assertStringContainsString('id="basic-shortcode"', $output);
		}
	}

?>