import { createI18n } from 'vue-i18n';
import fr from './translation/fr';
import en from './translation/en.json';

const i18n = createI18n({
      locale: 'en',
      messages: {
            en: en,
            fr: fr,
      },
});

export default i18n;