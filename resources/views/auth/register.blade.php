<!-- register.blade.php -->
<form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="radio" name="user_type" value="user" checked onchange="toggleFields()"> User
    <input type="radio" name="user_type" value="owner" onchange="toggleFields()"> Owner

    <!-- Common fields -->
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="text" name="phone" placeholder="Phone Number">

    <input type="file" name="photo" placeholder="Photo">

    <!-- Fields for owners -->
    <div id="ownerFields" style="display: none;">
        <!-- <input type="text" name="phonenumber" placeholder="Phone Number"> -->
    </div>

    <!-- Fields for users -->
    <div id="userFields">
        <input type="text" name="status" placeholder="Status">
        <input type="text" name="gender" placeholder="Gender">
        <input type="text" name="age" placeholder="Age">
        <input type="text" name="city" placeholder="City">
        <input type="text" name="where_to_go" placeholder="Where to go">
    </div>

    <input type="submit" value="Register">
</form>

<script>
    function toggleFields() {
        var userType = document.querySelector('input[name="user_type"]:checked').value;
        var ownerFields = document.getElementById('ownerFields');
        var userFields = document.getElementById('userFields');

        if (userType === 'owner') {
            ownerFields.style.display = 'block';
            userFields.style.display = 'none';
        } else {
            ownerFields.style.display = 'none';
            userFields.style.display = 'block';
        }
    }

    // Initial call to set initial visibility
    toggleFields();
</script>
