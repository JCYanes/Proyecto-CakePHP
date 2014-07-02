# $Id$
#
#	Copyright (C) 2014 Jésica Carballo Yanes
#
#   This program is free software: you can redistribute it and/or modify
#    it under the terms of the GNU Affero General Public License as
#    published by the Free Software Foundation, either version 3 of the
#    License, or (at your option) any later version.
#
#    This program is distributed in the hope that it will be useful,
#    but WITHOUT ANY WARRANTY; without even the implied warranty of
#    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#   GNU Affero General Public License for more details.
#
#    You should have received a copy of the GNU Affero General Public License
#   along with this program.  If not, see <http://www.gnu.org/licenses/>.

CREATE TABLE i18n (
	id int(10) NOT NULL auto_increment,
	locale varchar(6) NOT NULL,
	model varchar(255) NOT NULL,
	foreign_key int(10) NOT NULL,
	field varchar(255) NOT NULL,
	content mediumtext,
	PRIMARY KEY	(id),
#	UNIQUE INDEX I18N_LOCALE_FIELD(locale, model, foreign_key, field),
#	INDEX I18N_LOCALE_ROW(locale, model, foreign_key),
#	INDEX I18N_LOCALE_MODEL(locale, model),
#	INDEX I18N_FIELD(model, foreign_key, field),
#	INDEX I18N_ROW(model, foreign_key),
	INDEX locale (locale),
	INDEX model (model),
	INDEX row_id (foreign_key),
	INDEX field (field)
);
