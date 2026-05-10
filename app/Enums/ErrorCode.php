<?php

namespace App\Enums;

class ErrorCode
{
    // Authentification
    const UNAUTHENTICATED  = ['code' => 'UNAUTHENTICATED',  'message' => 'Vous devez être connecté'];
    const ACCESS_DENIED    = ['code' => 'ACCESS_DENIED',    'message' => 'Accès refusé'];

    // Ressources
    const EVENT_NOT_FOUND  = ['code' => 'EVENT_NOT_FOUND',  'message' => 'Évènement non trouvé'];
    const REGISTER_NOT_FOUND   = ['code' => 'REGISTER_NOT_FOUND',   'message' => 'Inscription non trouvée'];
    const CAPACITY_REACHED       = ['code' => 'CAPACITY_REACHED',       'message' => "Cet évènement est complet"];

    // Validation
    const DUPLICATE_EMAIL  = ['code' => 'DUPLICATE_EMAIL',  'message' => 'Cette adresse email est déjà enregistrée pour cet évènement'];
    const EMAIL_REQUIRED   = ['code' => 'EMAIL_REQUIRED',   'message' => "L'email est obligatoire"];
    const EMAIL_INVALID    = ['code' => 'EMAIL_INVALID',    'message' => "Format d'email invalide"];
    const PASSWORD_REQUIRED= ['code' => 'PASSWORD_REQUIRED','message' => 'Le mot de passe est obligatoire'];
    const PASSWORD_TOO_SHORT=['code' => 'PASSWORD_TOO_SHORT','message' => 'Minimum 8 caractères'];
    const NAME_REQUIRED    = ['code' => 'NAME_REQUIRED',    'message' => 'Le nom est obligatoire'];
    const NAME_TOO_LONG    = ['code' => 'NAME_TOO_LONG',    'message' => 'Maximum 255 caractères'];
    const TITLE_REQUIRED   = ['code' => 'TITLE_REQUIRED',   'message' => 'Le titre est obligatoire'];
    const TITLE_STRING     = ['code' => 'TITLE_STRING',     'message' => 'Le titre doit être une chaîne de caractères'];
    const TITLE_MAX_100    = ['code' => 'TITLE_MAX_100',    'message' => 'Le titre doit comporter au maximum 100 caractères'];
    const DATE_REQUIRED    = ['code' => 'DATE_REQUIRED',    'message' => 'La date est obligatoire'];
    const DATE_DATE        = ['code' => 'DATE_DATE',        'message' => 'La date doit être au format YYYY-MM-DD'];
    const CAPACITY_REQUIRED= ['code' => 'CAPACITY_REQUIRED', 'message' => 'La capacité est obligatoire'];
    const CAPACITY_INTEGER = ['code' => 'CAPACITY_INTEGER',  'message' => 'La capacité doit être un entier'];
    const CAPACITY_MIN_1   = ['code' => 'CAPACITY_MIN_1',   'message' => 'La capacité doit être superieure à 0'];
    const LOCATION_REQUIRED = ['code' => 'LOCATION_REQUIRED', 'message' => 'Le lieu est obligatoire'];
    const LOCATION_STRING = ['code' => 'LOCATION_STRING', 'message' => 'Le lieu doit être une chaîne de caractères'];

    const FIRST_NAME_REQUIRED = ['code' => 'FIRST_NAME_REQUIRED', 'message' => 'Le prénom est obligatoire'];
    const FIRST_NAME_STRING = ['code' => 'FIRST_NAME_STRING', 'message' => 'Le prénom doit être une chaîne de caractères'];
    const LAST_NAME_REQUIRED = ['code' => 'LAST_NAME_REQUIRED', 'message' => 'Le nom est obligatoire'];
    const LAST_NAME_STRING = ['code' => 'LAST_NAME_STRING', 'message' => 'Le nom doit être une chaîne de caractères'];
}