## One To One (Polymorphic)
A one-to-one polymorphic relation is similar to a typical one-to-one relation; however, the child model can belong to more than one type of model using a single association.

- Post:
    - CommentPost
- Video:
    -CommentVideo

==> with polymorphic
- Post
- Video
- Comment:
    - commentable_id
    - commentable_type (Post, Video, ...)

to create two columns commentable_id and type use single line : 
<code>$table->morphs('commentable')</code>

Relation between Post or Video and Comments use : 
<p><code>$this->morphMany(Comment::class, 'commentable')</code></p>

To get just one comment : <code>$this->morphOne(Comment::class, 'commentable')->latestOfMany()</code>


<b>Inverse relation : </b><code>$this->morphTo('commentable')</code>