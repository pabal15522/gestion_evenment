<?php

namespace App\Http\Controllers\Api;

use App\Enums\ErrorCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\InscriptionRequest;
use App\Models\Evenement;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InscriptionController extends Controller
{
    //
    public function index($id)
    {
        $event = Evenement::find($id);
        if (!$event) {
            return $this->error(ErrorCode::EVENT_NOT_FOUND, 404);
        }
        $registrations = $event->inscriptions;
        return $this->success($registrations);
    }
    public function store(InscriptionRequest $request, $id)
    {
        $event = Evenement::find($id);
        // Vérification de l'existence de l'événement
        if (!$event) {
            return $this->error(ErrorCode::EVENT_NOT_FOUND, 404);
        }

        // Vérification de la capacité de l'événement
        $countRegistrations = Inscription::where('eventId', $id)->count();
        if ($countRegistrations >= $event->capacity) {
            return $this->error(ErrorCode::CAPACITY_REACHED, 422);
        }

        // Vérification de l'unicité de l'email pour cet événement
        $emailUsed = Inscription::where('email', $request->email)->where('eventId', $id)->exists();
        if ($emailUsed) {
            return $this->error(ErrorCode::DUPLICATE_EMAIL, 409);
        }

        $registration = Inscription::create($request->validated() + ['eventId' => $id]);
        return $this->success($registration, 201);
    }
    public function destroy($id)
    {
        $registration = Inscription::find($id);
        if (!$registration) {
            return $this->error(ErrorCode::REGISTER_NOT_FOUND, 404);
        }
        $registration->delete();
        return $this->success(null, 200);
    }
}
