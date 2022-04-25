#!/usr/bin/perl

use strict;
use warnings;
use Data::Dumper;
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);


my $query = CGI->new;

my $html_pre = q(
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Lato',sans-serif;
}
body{
  height: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background: #f0f2f5;
}
.container{
  max-width: 750px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.10);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}

td {
   word-break:break-all;
   vertical-align: top;
}
    </style>
   </head>
<body>
  <div class="container">
    <div class="title">User Details</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <table style="width:100%">
);

my $html_post= q(
</table>
          </div>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
);

print $query->header;

my $fname = $query->param('fname');
my $lname = $query->param('lname');
my $email = $query->param('email');
my $gender = $query->param('gender');
my $street = $query->param('street_address');
my $city = $query->param('city');
my $province = $query->param('province');
my $postal_code = $query->param('postal_code');
my $country = $query->param('country');
my $phone = $query->param('phone');
my $pwd = $query->param('password');
my $re_pwd = $query->param('password-confirm');


my $info_str = "<tr> <td><b>Name</b></td> <td>${fname} ${lname} </td> </tr><tr> <td><b>Gender</b></td> <td>${gender} </td> </tr>";
# validate email
if ($email =~ /^[a-z0-9A-Z][A-Za-z0-9.]+[A-Za-z0-9]\@[A-Za-z0-9.-]+$/)
{
    $info_str = $info_str . "<tr> <td><b>Email</b></td> <td>${email} </td> </tr>";
}else{
    $info_str = $info_str . "<tr> <td><b>Email</b></td> <td style=\"background-color: rgb(240, 210, 210);\">${email} </td></td> <td>Invalid email</td> </tr>";
}

$info_str = $info_str . "<tr> <td><b>Street</b></td> <td>${street} </td> </tr>" ;
$info_str = $info_str . "<tr> <td><b>City</b></td> <td>${city}</td> </tr>" ;
$info_str = $info_str . "<tr> <td><b>Province</b></td> <td>${province} </td> </tr>" ;
$info_str = $info_str . "<tr> <td><b>Country</b></td> <td>${country} </td> </tr>" ;

#validate postal code
$postal_code =~ s/^\s+|\s+$//g;

if ($postal_code =~ /^\s*[A-Za-z][0-9][A-Za-z]\s+[0-9][A-Za-z][0-9]\s*$/){
    $info_str = $info_str . "<tr> <td><b>Postal code</b></td> <td> ${postal_code} </td> </tr>" ;
}else{
    $info_str = $info_str . "<tr> <td><b>Postal code</b></td> <td style=\"background-color: rgb(240, 210, 210);\"> ${postal_code} </td><td>Invalid postal code</td> </tr>" ;
}

# Validate phone number

if ($phone =~ /^\s*[0-9]{10}\s*$/){
    $info_str = $info_str . "<tr> <td><b>Phone</b></td> <td> ${phone} </td> </tr>" ;
}else{
    $info_str = $info_str . "<tr> <td><b>Phone</b></td> <td style=\"background-color: rgb(240, 210, 210);\"> ${phone} </td><td>Invalid contact number</td> </tr>" ;
}

if ($pwd ne $re_pwd){
    $info_str = $info_str . "<tr> <td><b>Password</b></td> <td style=\"background-color: rgb(240, 210, 210);\"> Password and Confirm Password doesn't match </td><td>Invalid password</td> </tr>" ;
}

my $html_code = $html_pre . $info_str . $html_post;
print $html_code;
