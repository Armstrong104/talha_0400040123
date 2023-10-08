<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public static $blog;

    public static function saveBlog($request){
        self::$blog = new Blog();
        self::$blog->category_id = $request->category_id;
        self::$blog->title = $request->title;
        self::$blog->author_name = $request->author_name;
        self::$blog->description = $request->description;
        self::$blog->image = imageUpload($request->image,'blog-images');
        self::$blog->save();
    }

    public static function updateBlog($request,$id){
        self::$blog = Blog::find($id);
        self::$blog->category_id = $request->category_id;
        self::$blog->title = $request->title;
        self::$blog->author_name = $request->author_name;
        self::$blog->description = $request->description;
        if($request->image){
            if(file_exists(self::$blog->image)){
                unlink(self::$blog->image);
            }
            self::$blog->image = imageUpload($request->image,'blog-images');
        }
        self::$blog->save();
    }

    public static function deleteBlog($id)
    {
        self::$blog = Blog::find($id);
        if(file_exists(self::$blog->image)){
            unlink(self::$blog->image);
        }
        self::$blog->delete();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
