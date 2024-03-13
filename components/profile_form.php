<h2>Update Personal Details</h2>
<form action="/includes/update_profile.php" method="POST">
  <label for="first_name">First Name:</label>
  <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>"><br><br>

  <label for="last_name">Last Name:</label>
  <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>"><br><br>
  <label for="date_of_birth">Date of Birth:</label>
  <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $user['date_of_birth']; ?>"><br><br>
  <label for="nationality">Nationality:</label>
  <input type="text" id="nationality" name="nationality" value="<?php echo $user['nationality']; ?>"><br><br>
  <label for="gender">Gender:</label>
  <select name="gender" id="gender">
    <option value="female" <?php if(isset($user['gender']) && $user['gender'] === 'female') echo 'selected'; ?>>Female</option>
    <option value="male" <?php if(isset($user['gender']) && $user['gender'] === 'male') echo 'selected'; ?>>Male</option>
  </select>
  
  <label for="faculty">Faculty:</label>
  <input type="text" id="faculty" name="faculty" value="<?php echo $user['faculty']; ?>"><br><br>
  <label for="study_mode">Study Mode (Full or Part-time):</label>
  <input type="text" id="study_mode" name="study_mode" value="<?php echo $user['study_mode']; ?>"><br><br>
  <label for="photo">Photo:</label>
  <input type="text" id="photo" name="photo" value="<?php echo $user['photo']; ?>"><br><br>
  <label for="program_type">Degree Level:</label>
  <input type="text" id="program_type" name="program_type" value="<?php echo $user['program_type']; ?>"><br><br>
  <label for="student_type">New Student or Existing Student:</label>
  <select name="student_type" id="student_type">
    <option value="new student" <?php if(isset($user['student_type']) && $user['student_type'] === 'new student') echo 'selected'; ?>>New Student</option>
    <option value="existing student" <?php if(isset($user['student_type']) && $user['student_type'] === 'existing student') echo 'selected'; ?>>Existing student</option>
  </select>
  <button type="submit">Update Profile</button>
</form>