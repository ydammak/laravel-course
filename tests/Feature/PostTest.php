<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Str;


class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSavePost()
    {
        $post = new Post();
        $post->title = "new";
        $post->content = "new";
        $post->slug = Str::slug($post->title, '-');
        $post->active = false;
        $post->save();

        $this->assertDatabaseHas('posts',[
            'title'=>'new'
        ]);
    }
    public function testPostStoreFail()
    {
        $data= [
            'title'=>'',
            'content'=> ''
        ];
        $this->post('/posts',$data)
             ->assertStatus(302)
             ->assertSessionHas('errors');
        $messages = session('errors')->getMessages();

        $this->assertEquals($messages['title'][0],'The title field is required.');
        $this->assertEquals($messages['title'][1],'The title must be at least 4 characters.');
        $this->assertEquals($messages['content'][0],'The content field is required.');

       
    }
}
