/**
 * patient_tbl.sql
 *
 * Creation of patient_tbl structure
 *
 * Licensed under the GNU GPL. For full terms see the file LICENSE.
 *
 * @package   OpenClinic
 * @copyright 2002-2006 jact
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @version   CVS: $Id: patient_tbl.sql,v 1.7 2006/03/28 19:01:43 jact Exp $
 * @author    jact <jachavar@gmail.com>
 */

CREATE TABLE patient_tbl (
  id_patient INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  /*last_update_date DATE NOT NULL,*/ /* fecha de �ltima actualizaci�n */
  nif VARCHAR(20) NULL,
  first_name VARCHAR(25) NOT NULL,
  surname1 VARCHAR(30) NOT NULL,
  surname2 VARCHAR(30) NOT NULL,
  address TEXT NULL DEFAULT '',
  phone_contact TEXT NULL DEFAULT '',
  sex ENUM('V','H') NOT NULL DEFAULT 'V',
  race VARCHAR(25) NULL, /* raza: amarilla, blanca, cobriza, negra */
  birth_date DATE NULL, /* fecha de nacimiento */
  birth_place VARCHAR(40) NULL, /* lugar de nacimiento */
  decease_date DATE NULL, /* fecha de defunci�n */
  nts VARCHAR(30) NULL, /* n�mero de tarjeta sanitaria */
  nss VARCHAR(30) NULL, /* n�mero de la seguridad social */
  family_situation TEXT NULL, /* situaci�n familiar */
  labour_situation TEXT NULL, /* situaci�n laboral */
  education TEXT NULL, /* estudios */
  insurance_company VARCHAR(30) NULL, /* entidad aseguradora */
  id_member INT UNSIGNED NULL, /* clave del m�dico al que pertenece por cupo */
  FOREIGN KEY (id_member) REFERENCES staff_tbl(id_member) ON DELETE SET NULL
);
