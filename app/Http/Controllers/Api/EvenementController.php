<?php

namespace App\Http\Controllers\Api;

use App\Enums\ErrorCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRegisterRequest;
use App\Models\Evenement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EvenementController extends Controller
{
    //
    public function index(Request $request): JsonResponse
    {
      
       $events = Evenement::withCount('inscriptions');
        if ($request->filled('search')) {
                $search = $request->search;
                $events->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
                });
            }

            if ($request->filled('date')) {
                $events->where('date','like', "%{$request->date}%");
            }
        return $this->success($events->get());

    }

    public function store(EventRegisterRequest $request): JsonResponse
    {
       //Ajout d'un événement après validation des données par EventRegisterRequest
        $event = Evenement::create($request->validated());
        return $this->success($event, 201);
    }
    public function show($id)
    {
        $event = Evenement::find($id);
        if (!$event) {
            return $this->error(ErrorCode::EVENT_NOT_FOUND, 404);
            //return $this->error("EVENT_NOT_FOUND","Evènment non trouvé", 404);
        }
        return $this->success($event);
    }
    public function update(EventRegisterRequest $request, $id): JsonResponse
    {
        $event = Evenement::find($id);
        if (!$event) {
           return $this->error(ErrorCode::EVENT_NOT_FOUND, 404);
        }
        $event->update($request->all());
        $event->save();
        return $this->success($event, 201);
    }
    public function destroy($id)
    {
        $event = Evenement::find($id);
        if (!$event) {
            return $this->error(ErrorCode::EVENT_NOT_FOUND, 404);
        }
        $event->delete();
        return $this->success(null, 201);
    }
}
