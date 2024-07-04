<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::all();
    
        if ($templates->isEmpty()) {
            return response()->json([
                'message' => 'No templates found',
                'data' => []
            ], 200);
        }
    
        return response()->json([
            'message' => 'Templates retrieved successfully',
            'data' => $templates
        ], 200);
    }
    
    public function store(Request $request)
    {
        $templateData = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
        ];

        $template = Template::create($templateData);

        return response()->json([
            'message' => 'Template created successfully',
            'data' => $template,
        ], 201);
    }

    public function show($id)
    {
        try {
            $template = Template::findOrFail($id);
            return response()->json([
                'message' => 'Template retrieved successfully',
                'data' => $template,
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Template not found',
            ], 404);
        }
    }
}
