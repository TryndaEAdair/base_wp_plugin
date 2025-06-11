<?php

	use PHPUnit\Framework\TestCase;

	class MapDisplayTest extends TestCase {
		public function test_basic_block_output_contains_container() {
			ob_start();
			$html = render_basic_block();
			ob_end_clean();

			$this->assertStringContainsString('id="basic-block"', $html);
		}
	}

?>