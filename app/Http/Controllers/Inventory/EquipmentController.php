<?php

namespace InvOco\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use InvOco\Http\Controllers\Controller;
use InvOco\Equipment;
use InvOco\Http\Services\Equipment as SEquipment;
use InvOco\Repositories\EquipmentsRepository;
use InvOco\Sector;
use InvOco\TypeEquipment;

class EquipmentController extends Controller
{
    private $equipmentsRepository;
    private $equipment;

    public function __construct(EquipmentsRepository $equipmentsRepository, SEquipment $equipment)
    {
        $this->equipmentsRepository = $equipmentsRepository;
        $this->equipment = $equipment;
    }

    public function index()
    {
        $equipment = new Equipment();
        $sector = (new Sector())->all();
        $all = $equipment->all();

        return view('inventory.inventory_index', with([
            'equipment' => $equipment,
            'sectors' => $sector,
            'equipments' => $all,
        ]));
    }

    public function create()
    {
        $equipment = new Equipment();
        $type = (new TypeEquipment())->all();

        $sector = (new Sector())->all();

        return view('inventory.inventory_create', with([
            'equipment' => $equipment,
            'sector' => $sector,
            'type' => $type,
        ]));
    }

    public function store(Request $request)
    {
        return redirect(route(''));
    }


    public function search(Request $request)
    {
        $equipment = $this->equipment->findEquipment($request['codebar']);
        $all = (new Equipment())->all();

        $sector = (new Sector())->all();

        return view('inventory.inventory_index', with([
            'equipment' => $equipment,
            'sectors' => $sector,
            'equipments' => $all,
        ]));
    }
}
