<?php 

class pnt_decode_Test extends WP_UnitTestCase {

    public function test_decode_messsage() {
        $message = 'Le coucou a quitté son nid.';

        $dictionary = array(
            'Le coucou' => 'La cible',
            'nid'       => 'domicile',
        );

        $decoded_message = pnt_decode( $message, $dictionary );

        $this->assertEquals( 'La cible a quitté son domicile.', $decoded_message );
    }

    public function test_decode_message_without_dictionary() {
        $message = 'Comment est votre blanquette?';

        $this->expectException( ArgumentCountError::class );

        $decoded_message = pnt_decode( $message );
    }

    public function test_decode_from_post_title() {

        $post_id = $this->factory()->post->create( array(
            'post_title' => 'Vol au dessus d\'un nid de coucous.'
        ) );

        $this->go_to( '?p=' . $post_id );

        $decoded_title = the_title();

        $this->expectOutputString( 'Vol au dessus d\'un domicile de cibles.', $decoded_title );
    }
}