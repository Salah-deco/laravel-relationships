## One To One relationship

A one-to-one relationship is a very basic type of database relationship. For example, a User model might be associated with one Address model. To define this relationship, we will place a address method on the User model. The Address method should call the hasOne method and return its result. The hasOne method is available to your model via the model's Illuminate\Database\Eloquent\Model

- hasOne method for user model, params foreign_key, and local_key. Example: <code>$this->hasOne(Address::class, 'uid', 'user_id');</code>
- belongsTo method for Address model to be associated with User model. same params

# to optimize Queries
'WITH' method to get all users in one query
- Example: <code>$addresses = Address::with('owner')->get(); </code>