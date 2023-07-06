create  table if not exists region
(
    id     serial
    constraint region_pkey
    primary key,
    name   json,
    status integer default 1,
    top    integer default 0
);

INSERT INTO public.region (id, name, status, top) VALUES (2, '{"cr": "Андижон вилояти", "en": "Andijan region", "ru": "Андижанская область", "uz": "Andijon viloyati"}', 1, 0);
INSERT INTO public.region (id, name, status, top) VALUES (4, '{"cr": "Жиззах вилояти", "en": "Jizzakh region", "ru": "Джизакская область", "uz": "Jizzax viloyati"}', 1, 0);
INSERT INTO public.region (id, name, status, top) VALUES (3, '{"cr": "Бухоро вилояти", "en": "Bukhara region", "ru": "Бухарская область", "uz": "Buxoro viloyati"}', 1, 0);
INSERT INTO public.region (id, name, status, top) VALUES (5, '{"cr": "Қашқадарё вилояти", "en": "Kashkadarya region", "ru": "Кашкадарьинская область", "uz": "Qashqadaryo viloyati"}', 1, 0);
INSERT INTO public.region (id, name, status, top) VALUES (6, '{"cr": "Навоий вилояти", "en": "Navoiy region", "ru": "Навоийская область", "uz": "Navoiy viloyati"}', 1, 0);
INSERT INTO public.region (id, name, status, top) VALUES (7, '{"cr": "Наманган вилояти", "en": "Namangan region", "ru": "Наманганская область", "uz": "Namangan viloyati"}', 1, 0);
INSERT INTO public.region (id, name, status, top) VALUES (8, '{"cr": "Самарқанд вилояти", "en": "Samarkand Region", "ru": "Самаркандская область", "uz": "Samarqand viloyati"}', 1, 0);
INSERT INTO public.region (id, name, status, top) VALUES (1, '{"cr": "Қорақалпоғистон Республикаси", "en": "Karakalpakstan Republic", "ru": "Республика Каракалпакстан", "uz": "Qoraqalpog''iston Respublikasi"}', 1, 0);
INSERT INTO public.region (id, name, status, top) VALUES (9, '{"cr": "Сурхондарё вилояти", "en": "Surkhandarya region", "ru": "Сурхандарьинская область", "uz": "Surxondaryo viloyati"}', 1, 0);
INSERT INTO public.region (id, name, status, top) VALUES (10, '{"cr": "Сирдарё вилояти", "en": "Syrdarya region", "ru": "Сырдарьинская область", "uz": "Sirdaryo viloyati"}', 1, 0);
INSERT INTO public.region (id, name, status, top) VALUES (11, '{"cr": "Тошкент вилояти", "en": "Tashkent region", "ru": "Ташкентская область", "uz": "Toshkent viloyati"}', 1, 0);
INSERT INTO public.region (id, name, status, top) VALUES (12, '{"cr": "Фарғона вилояти", "en": "Fergana region", "ru": "Ферганская область", "uz": "Farg''ona viloyati"}', 1, 0);
INSERT INTO public.region (id, name, status, top) VALUES (13, '{"cr": "Хоразм вилояти", "en": "Khorezm Region", "ru": "Хорезмская область", "uz": "Xorazm viloyati"}', 1, 0);
INSERT INTO public.region (id, name, status, top) VALUES (14, '{"cr": "Тошкент шаҳар", "en": "Tashkent City", "ru": "Город Ташкент", "uz": "Toshkent shahar"}', 1, 0);