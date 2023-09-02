<?php

namespace App\Http\Controllers;

use App\Http\Resources\OpportunityAttachmentResource;
use App\Models\OpportunityAttachment;

class AttachmentController extends Controller
{
    public function opportunityAttachment($id)
    {
        $data = OpportunityAttachment::where('opportunity_id', $id)->get();
        return OpportunityAttachmentResource::collection($data);
    }
}
