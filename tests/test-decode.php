<?php 

class pnt_decode_Test extends \PHPUnit\FrameWork\TestCase {

    public function test_decode_messsage() {
        $message = 'Le coucou a quitté son nid.';

        $dictionary = array(
            'Le coucou' => 'La cible',
            'nid'       => 'domicile',
        );

        $decoded_message = pnt_decode( $message, $dictionary );

        $this->assertEquals( 'La cible a quitté son domicile.', $decoded_message );
    }
}