<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\TranslationManager\Models\Translation;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
class TranslationController extends Controller
{
    protected $manager;

    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }
    public function index($group=null)
    {
        $locales = $this->manager->getLocales();
        $groups = Translation::groupBy('group');
        $excludedGroups = $this->manager->getConfig('exclude_groups');
        if($excludedGroups){
            $groups->whereNotIn('group', $excludedGroups);
        }

        $groups = $groups->select('group')->orderBy('group')->get()->pluck('group', 'group');
        if ($groups instanceof Collection) {
            $groups = $groups->all();
        }
        // $groups = [''=>'Choose a group'] + $groups;
        $numChanged = Translation::where('group', $group)->where('status', Translation::STATUS_CHANGED)->count();


        $allTranslations = Translation::where('group', $group)->orderBy('key', 'asc')->get();
        $numTranslations = count($allTranslations);
        $translations = [];
        foreach($allTranslations as $translation){
            $translations[$translation->key][$translation->locale] = $translation;
        }
        return view('translation.list')->with('translations', $translations)
        ->with('locales', $locales)
        ->with('groups', $groups)
        ->with('group', $group)
        ->with('numTranslations', $numTranslations)
        ->with('numChanged', $numChanged)
        ->with('editUrl', $group ? action('\Barryvdh\TranslationManager\Controller@postEdit', [$group]) : null)
        ->with('deleteEnabled', $this->manager->getConfig('delete_enabled'));
    }
}
