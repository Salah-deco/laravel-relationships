## Many To Many (Polymorphic)

# Table Structure

Many-to-many polymorphic relations are slightly more complicated than "morph one" and "morph many" relationships. For example, a Post model and Video model could share a polymorphic relation to a Tag model. Using a many-to-many polymorphic relation in this situation would allow your application to have a single table of unique tags that may be associated with posts or videos. First, let's examine the table structure required to build this relationship:

- Post
    - id
    - title

- Video
    - id
    - title

- Tag:
    - id
    - name

- Taggables:
    - tag_id
    - taggable_id
    - taggable_type

# !Infos to change name in taggable_type instead of \App\Models\model_name to name of Model  
go to AppServiceProvider boot method add code : 
<code>
    Relation::morphMap([
            'V' => \App\Models\Video::class, 
            'C' => \App\Models\Comment::class, 
            'T' => \App\Models\Tag::class, 
            'P' => \App\Models\Post::class
        ]);
</code>
