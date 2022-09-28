<?php
//このファイルはメールのひな型を支配するファイル。Bladeファイルはメール本文のみを支配するが、こっちは全体を支配。

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;

class PostComplete extends Mailable
{
    use Queueable, SerializesModels;
    
    public $post;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    //constructは"_"を2つつけないといけない。特殊ｒｕｌｅ。
    {
        $this->post = $post;
        $this->subject = $post->user->name . "さんが投稿しました";
        
        //変数にアクセスする場合、Local変数でないといけない。クラスの場合、$this=このクラス（この場合はPostComplete）に対してアクセスができる、という記述。
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.postcomplete'); 
        //bladeを指定。メールをレンダリングする為にbladeの呼び出し。
    }
}
