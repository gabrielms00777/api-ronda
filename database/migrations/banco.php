<?php
Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->dateTime('date_time');
            $table->json('filter');
            $table->json('data');
            $table->timestamps();
        });

        Schema::create('round_records', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor('stop_id')->constrained();
            $table->foreignIdFor('user_id')->constrained();
            $table->dateTime('date_time');
            $table->string('photo');
            $table->text('observation')->nullable();
            $table->timestamps();
        });
        Schema::create('stops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id')->constrained('routes');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 10, 8);
            $table->string('qrcode', 255);
            $table->timestamps();
        });

        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->enum('type', ['manager', 'employee']);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });


        class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'active',
    ];

    public function rounds()
    {
        return $this->hasMany(RoundRecord::class);
    }
}

class Stop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'latitude',
        'longitude',
        'qrcode',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function rounds()
    {
        return $this->hasMany(RoundRecord::class);
    }
}

class RoundRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'stop_id',
        'user_id',
        'date_time',
        'photo',
        'observation',
    ];

    public function stop()
    {
        return $this->belongsTo(Stop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date_time',
        'filter',
        'data',
    ];
}

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function stops()
    {
        return $this->hasMany(Stop::class);
    }

    public function rounds()
    {
        return $this->hasManyThrough(RoundRecord::class, Stop::class);
    }
}
