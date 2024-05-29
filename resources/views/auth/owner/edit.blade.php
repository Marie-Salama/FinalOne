<form method="POST" action="{{ route('owner.update', ['owner' => $owner->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <!-- Name input -->
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $owner->name }}" required>
    </div>

    <!-- Email input -->
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{$owner->email }}" required>
    </div>

    <!-- Phone input -->
    <div>
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ $owner->phone }}" required>
    </div>

    <!-- Password input -->
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>

    <!-- Confirm Password input -->
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
    </div>

    <!-- Profile Photo input -->
    <div>
        <label for="photo">Profile Photo</label>
        <input type="file" name="photo" id="photo">
    </div>

    <!-- Submit button -->
    <div>
        <button type="submit">Update Profile</button>
    </div>
</form>
