/**
 * @package OpenClinic
 *
 * @copyright Copyright (c) 2002-2006 jact
 * @license Licensed under the GNU GPL. For full terms see the file LICENSE.
 *
 * $Id: history_tbl.sql,v 1.5 2006/03/26 15:36:40 jact Exp $
 */

/**
 * history_tbl.sql
 *
 * Creation of history_tbl structure
 *
 * @author jact <jachavar@gmail.com>
 */

CREATE TABLE history_tbl (
  id_patient INT UNSIGNED PRIMARY KEY,
  birth_growth TEXT NULL, /* nacimiento y crecimiento (desarrollo) */
  growth_sexuality TEXT NULL, /* desarrollo y vida sexual */
  feed TEXT NULL, /* alimentaci�n */
  habits TEXT NULL, /* h�bitos */
  peristaltic_conditions TEXT NULL, /* condiciones perist�ticas */
  psychological TEXT NULL, /* psicol�gicos */
  children_complaint TEXT NULL, /* enfermedades de la infancia */
  venereal_disease TEXT NULL, /* enfermedades de transmisi�n sexual */
  accident_surgical_operation TEXT NULL, /* accidentes e intervenciones quir�rgicas */
  medicinal_intolerance TEXT NULL, /* intolerancia medicamentosa */
  mental_illness TEXT NULL, /* enfermedades mentales y neur�ticas */
  parents_status_health TEXT NULL, /* estado de salud de los padres */
  brothers_status_health TEXT NULL, /* estado de salud de los hermanos */
  spouse_childs_status_health TEXT NULL, /* estado de salud del c�nyuge e hijos */
  family_illness TEXT NULL, /* enfermedades acumuladas en la familia */
  FOREIGN KEY (id_patient) REFERENCES patient_tbl(id_patient) ON DELETE CASCADE
);
