@extends('layouts.master')

@section ('title')
Register
@endsection

@section('content')
    <form action="/welcome" method="POST">
    @csrf
        <Label>First name: </Label><br>
        <input type="text" name="fname" /> <br>
        <br>
        <Label>Last name:</Label><br>
        <input type="text" name="lname" /> <br>
        <br>

        <br>
        <label>Gender</label><br><br>
        <input type="radio" name="gender">Male<br>
        <input type="radio" name="gender">Female<br>
        <input type="radio" name="gender">Other<br>
        
        <br>
        <label>Nationality:</label><br><br>
        <select name="negara">
            <option value="1">Indonesian</option>
            <option value="2">Singaporean</option>
            <option value="3">Malaysian</option>
            <option value="4">Australian</option>
        </select>
        <br>

        <br>
        <label>Language Spoken:</label><br><br>
        <input type="checkbox" name="bahasa">Bahasa Indonesia<br>
        <input type="checkbox" name="bahasa">English<br>
        <input type="checkbox" name="bahasa">Other<br>
        <br>

        <br>
        <label>Bio:</label><br><br>
        <textarea name="bio" cols="40" rows="10"></textarea>
        <br>
        <input type="submit" value="Sign Up">
    </form>
@endsection