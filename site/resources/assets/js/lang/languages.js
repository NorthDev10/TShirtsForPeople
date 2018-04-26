import uk from './uk/index'
import en from './en/index'

const defaultLang = 'uk';

let languages = {
	default: defaultLang,
	uk: uk,
	en: en
};

class LanguagePack {

	// проверяем, поддерживается ли выбранный язык
	static isLangSupported(app, lang) {
		if(languages.hasOwnProperty(lang)) {
			return true
		}
		return false;
	}

	static setLanguages(app) {
		//сначала читаем get параметр lang
		if(LanguagePack.isLangSupported(app, app.$route.params.lang)) {
			app.language = app.$route.params.lang;
		} else {
			/* если выбранный язык, взятый из get параметра не поддерживается, 
			то считываем его из LocalStorage*/
			let vueLang = LanguagePack.getLocalStorageLang();
			if(LanguagePack.isLangSupported(app, vueLang)) {
				app.language = vueLang;
			} else {// иначе устанавливаем язык по умолчанию
				app.language = defaultLang;
			}
		}
		app.$validator.localize(app.language);
	}

	static getLocalStorageLang() {
		let vueLang = localStorage.getItem('vue-lang');
		if(vueLang) {
			return vueLang;
		} else {
			return defaultLang;
		}
	}

	// возвращем объект с локализацией
	static getLanguages() {
		return languages;
	}
}

export default LanguagePack;