<h1>User Profile</h1>

<p>Name: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<p>Status: {{ $user->status }}</p>
<p>Phone-Number: {{ $user->phone }}</p>
<p>Age: {{ $user->age }}</p>
<p>Gender: {{ $user->gender }}</p>


<!-- <p>Photo Path: {{ $user->photo }}</p>  -->

@if ($userImage)
    <h3>User Photo:</h3>
    <div>
        <img src="{{ $userImage }}" alt="User Photo" style="max-width: 750px; max-height: 650px;">
        <!-- <img src="{{ asset('storage/images/image-name.jpg') }}" alt="Image"> -->

    </div>
@endif

<a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
