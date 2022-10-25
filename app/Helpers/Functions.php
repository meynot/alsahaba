<?php
/***************************************
 * Helpers/Functions.php
 *    Helper function gloably used
 *
 **************************************/


/* 
 * getLanguagesList 
 *    return array of folders in "lang" folder 
 *		Folders inside lang folder are ISO2 name
 */
if( ! function_exists( 'getLanguagesList') )
{
	function getLanguagesList()
	{
		
		$languages = \File::directories(base_path('lang'));
		
		$result = [];
		foreach($languages as $language)
		{
			$folders = explode(DIRECTORY_SEPARATOR , $language);
			$iso2 = end($folders);
			$result[$iso2]= locale_get_display_language($iso2, $iso2);//Locale::getDisplayLanguage($iso2, $iso2);
		}

		return $result;
	}
}

if( ! function_exists('locale_get_display_language') ) 
{
	function locale_get_display_language(string $locale, ?string $displayLocale = null): string|false
	{
		return __('index.title', [], $locale).'_'. __('index.flag', [], $locale);
	}
}