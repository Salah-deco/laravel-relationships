## One To Many relationship

A one-to-many relationship is used to define relationships where a single model is the parent to one or more child models. For example, a User may have an infinite number of Post. Like all other Eloquent relationships, one-to-many relationships are defined by defining a method on your Eloquent model:

- hasMany method for User model to Post, params foreign_key, and local_key. 
Example: <br>
<code>
    public function posts() {<br>
        return $this->hasMany(Post::class, 'user_id', 'user_id'); // second param for foreign_key, and third param for local_key<br>
    }
</code>
- belongsTo method for Inverse OneToMany 
Example: <br>
<code>
     public function user() {<br>
        return $this->belongsTo(User::class, 'user_id', 'user_id')
            ->withDefault([
                'name' => 'Guest'
            ]); // with default if user not found<br>
    }<br>
</code>

# to optimize Queries
to optimize queries add <b>has</b> method and <b>with</b> method to get the specified post for example:
<code>$users = User::has('posts', '>=', 2)->with('posts')->get(); // users have more than two posts</code>
