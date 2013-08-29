DROP DATABASE Patient_Management;
create database patient_management;
use patient_management;

CREATE TABLE Patient (
  PatientID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Name VARCHAR(30),
  DateOfBirth DATE,
  Gender ENUM ('male', 'female'),
  Nationality VARCHAR(40),
  DateOfAddmission DATE,
  PastMedicalHistory TEXT,
  PastSurgicalHistory TEXT,
  Diagnosis TINYTEXT
);

CREATE TABLE Pain (
  PainID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  PatientID INT,
  LocationOfPain TINYTEXT,
  Pattern ENUM  ('Constant', 'Intermittent'),
  Intensity TINYINT,
  AtThisMoment ENUM ('Worse', 'Best'),
  CharacterOfPain ENUM ('Shooting', 'Pricking', 'Throbbing', 'Aching', 'Pulling', 'Dull', 'Burning', 'Sharp'),
  CharacterOther TINYTEXT,
  Radiation BIT,
  TypeOfPain ENUM ('Somatic', 'Visceral', 'Neuropathic', 'Mixed'),
  Mixed TINYTEXT,
  WhatRelievesPain TINYTEXT,
  WhatIncreasesPain TINYTEXT,
  PainAffectsSleep BIT,
  PainAffectsMood BIT,
  PainAffectsActivity BIT,
  PainAffectsNutrition BIT,
  PainAffectsSocialInteraction BIT,
  Comments TEXT,
  MedicationPlan TEXT,
  FOREIGN KEY (PatientID) REFERENCES Patient(PatientID)
);

CREATE TABLE Medicine (
  TreatementID INT AUTO_INCREMENT PRIMARY KEY,
  PainID INT,
  DateTime DATETIME,
  Opioids TINYTEXT,
  Dose TINYTEXT,
  Frequency TINYTEXT,
  RouteOfAddmission TINYTEXT,
  SideEffects TEXT,
  Comments TEXT,
  FOREIGN KEY (PainID) REFERENCES Pain(PainID)
);

-- Patient has many Pains. Pain is treated by many Medicine.
