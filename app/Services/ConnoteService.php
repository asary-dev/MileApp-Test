<?php

namespace App\Services;

use App\Models\Connote;
use Error;
use Exception;
use Illuminate\Http\Request;

class ConnoteService
{

    protected $connote;

    public function __construct(Connote $connote)
    {
        $this->connote = $connote;
    }

    public function getAllConnotes(Request $requests)
    {
        return $this->connote->all();
    }

    public function getOneById($id)
    {
        return $this->connote->findOrFail($id);
    }

    public function saveConnote($input)
    {
        try {
            $createdConnote = new $this->connote;

            $createdConnote->fill($input);
            $createdConnote->save();

            return $createdConnote;
        } catch (Exception $e) {

            throw new Error($e);
        }
    }

    public function updateConnote($input, $id)
    {
        try {
            $this->connote::where('id', $id)->update($input);

            // $updatedConnote->fill($input);
            // $updatedConnote->save();

            return $this->connote->find($id);
        } catch (Exception $e) {
            throw new Error($e);
        }
    }

    /**
     *
     * Deactivate one Connote
     *
     */
    public function softDeleteConnote($id)
    {
        try {
            $this->connote->softDelete($id);
            return true;
        } catch (Exception $e) {
            throw new Error($e);
        }
    }

    /**
     *
     * Permanently delete one Connote
     *
     */
    public function hardDeleteConnote()
    {
        //process one entity
    }

    /**
     *
     * Recover one Connote
     *
     */
    public function recoverConnote()
    {
        //process one entity
    }
}
