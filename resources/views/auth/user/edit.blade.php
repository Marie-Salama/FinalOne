<!-- <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ $user->name }}" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="{{ $user->email }}" required>

    <div class="form-group">
        <label for="old_password">Old Password</label>
        <input type="password" name="old_password" id="old_password" class="form-control" required>
    </div>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <label for="status">Status</label>
    <input type="text" id="status" name="status" value="{{ $user->status }}" required>

    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone" value="{{ $user->phone }}" required>

    <label for="age">Age</label>
    <input type="number" id="age" name="age" value="{{ $user->age }}" required>

    <label for="gender">Gender</label>
    <select id="gender" name="gender" required>
        <option value="Male" {{ $user->gender === 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ $user->gender === 'Female' ? 'selected' : '' }}>Female</option>
        <option value="Other" {{ $user->gender === 'Other' ? 'selected' : '' }}>Other</option>
    </select>

    <label for="photo">Profile Photo</label>
    <input type="file" id="photo" name="photo">

    <button type="submit">Save Changes</button>
</form> -->


<!-- Display form for editing user profile -->
<form method="POST" action="{{ route('profile.update', ['id' => Auth::id()]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Name input -->
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}" required>
    </div>

    <!-- Email input -->
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}" required>
    </div>

    <!-- Status input -->
    <div>
        <label for="status">Status</label>
        <input type="text" name="status" id="status" value="{{ $user->status }}" required>
    </div>

    <!-- Phone input -->
    <div>
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ $user->phone }}" required>
    </div>

    <!-- Age input -->
    <div>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" value="{{ $user->age }}" required>
    </div>

    <!-- Gender input -->
    <div>
        <label for="gender">Gender</label>
        <select name="gender" id="gender" required>
            <option value="Male" {{ $user->gender === 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ $user->gender === 'Female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ $user->gender === 'Other' ? 'selected' : '' }}>Other</option>
        </select>
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