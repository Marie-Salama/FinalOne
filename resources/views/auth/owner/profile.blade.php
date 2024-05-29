<!-- resources/views/owner/profile.blade.php -->

<h1>Owner Profile</h1>

<p>Name: {{ $owner->name }}</p>
<p>Phone-Number: {{ $owner->phone }}</p>
<p>Email: {{ $owner->email }}</p>

@if ($ownerImage)
    <h3>owner Profile:</h3>
    <div>
       <img src="{{ $ownerImage}}" alt="owner Photo" style="max-width: 750px; max-height: 650px;">
       
    </div>
@endif 

<a href="{{ route('owner.edit') }}" class="btn btn-primary">Edit Profile</a>


<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>



