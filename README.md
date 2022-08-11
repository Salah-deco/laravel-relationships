## Has One Through
The "has-one-through" relationship defines a one-to-one relationship with another model. However, this relationship indicates that the declaring model can be matched with one instance of another model by proceeding through a third model.

## Has Many Through
The "has-many-through" relationship provides a convenient way to access distant relations via an intermediate relation.

<hr>

- Project
    - id - integer
    - title - string
- User
    - user_id
    - project_id

- Task
    - id
    - title
    - user_id

Project has many task through user
=> add method tasks in project Model 
Example: <code>$this->hasManyThrough(Task::class, User::class, 'project_id', 'user_id', 'id', 'user_id')</code>

=> add method task in project Model 
Example: <code>$this->hasOneThrough(Task::class, User::class, 'project_id', 'user_id', 'id', 'user_id')</code>
