## Has Many Through
The "has-many-through" relationship provides a convenient way to access distant relations via an intermediate relation.

<hr>

- Project:
    - id - integer
    - title - string

- User:
    - user_id
    - ...

- project_user (Model Team)
    - project_id
    - user_id

- Task
    - id
    - title
    - user_id


Has Many Through allow Project method access to task using pivote table project_user
Example: 
<code>
    $this->hasManyThrough(Task::class, Team::class, 'project_id', 'user_id', 'id', 'user_id');
</code>