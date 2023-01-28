<?php

namespace App\Services;

use App\Models\KoliData;
use App\Services\ConnoteService;
use Error;
use Exception;
use Illuminate\Http\Request;

// use Jenssegers\Mongodb\S;

class KoliDataService
{

    protected $koliData;
    protected $connoteService;

    public function __construct(KoliData $koliData, ConnoteService $connoteService)
    {
        $this->koliData = $koliData;
        $this->connoteService = $connoteService;
    }

    public function getAllKoliDatas(Request $requests)
    {
        return $this->koliData->all();
    }

    public function getOneById($id)
    {
        return $this->koliData->findOrFail($id);
    }

    public function saveKoliData($input)
    {

        try {
            $createdKoliData = new $this->koliData;

            $createdKoliData->fill($input);
            $createdKoliData->save();

            return $createdKoliData;
        } catch (Exception $e) {
            throw new Error($e);
        }
    }

    public function bulkSaveKoliData($input)
    {
        try {
            $createdKoliData = new $this->koliData;

            $createdKoliData->insert($input);

            return $createdKoliData;
        } catch (Exception $e) {
            throw new Error($e);
        }
    }

    public function bulkUpdateKoliData($input)
    {
        try {
            foreach ($input as $key => $value) {
                $this->koliData::where('id', $value['id'])->update($value);
            }

        } catch (Exception $e) {
            throw new Error($e);
        }
    }

    public function updateKoliData($input, $id)
    {
        try {
            $updatedKoliData = $this->koliData->find($id);

            $updatedKoliData->fill($input);
            $updatedKoliData->save();

            return $updatedKoliData;
        } catch (Exception $e) {
            throw new Error($e);
        }
    }

    /**
     *
     * Deactivate one KoliData
     *
     */
    public function softDeleteKoliData($id)
    {
        try {
            $this->koliData->softDelete($id);
            return true;
        } catch (Exception $e) {
            throw new Error($e);
        }
    }

    /**
     *
     * Permanently delete one KoliData
     *
     */
    public function hardDeleteKoliData()
    {
        //process one entity
    }

    /**
     *
     * Recover one KoliData
     *
     */
    public function recoverKoliData()
    {
        //process one entity
    }
}
