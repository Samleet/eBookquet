<?php

namespace App\Enums;

abstract class Error
{
    const INTERNAL_SERVER_ERROR = "Oops! Something went wrong! Help us improve your experience by sending an error report";
    const SERVICE_UNAVAILABLE = "Service Temporarily Unavailable";
    const RESOURCE_NOT_FOUND = "Resource not found.";
    const BAD_CREDENTIALS = "Email or Password is invalid.";
    const TOKEN_EXPIRED = "Invalid or expired token.";
    const USER_NOT_FOUND = "User not found.";
    const NO_CUSTODIAN = "We couldnt find any Custodian with the given ID";
    const MISSING_FIELDS = "TThe given data is invalid! please check again.";
    const WRONG_PIN = "The 'PIN Code' is incorrect for this account.";
    const TWO_FA_VERIFICATION_FAILED = "Verification failed because Two-Factor Authentication is not enabled.";
    const TWO_FA_REQUIRED = "Two-Factor Authentication Required";
    const INVALID_CURRENT_PASSWORD = "Invalid current password supplied.";
    const INVALID_PASSWORD = "Invalid password supplied.";
    const SAME_PASSWORD = "The new password and current password cannot be the same.";
    const OTP_EXPIRED = "Invalid or expired OTP.";
    const ACCESS_DENIED = "Access Denied! This action is unauthorized.";
    const ACCESS_DENIED_OWNER = "Access Denied! You do not own this {}.";
    const RESOURCE_IS_OWNED = "You have already added this book to your shelf";
    const BOOK_NOT_RENTOUT = "You have not yet rented this book for your bookhut";
    const INVALID_FILE_FORMAT = "File format not supported.";
    const INVALID_BASE_64_STRING = "Oops! Base64 string is not valid.";
}
