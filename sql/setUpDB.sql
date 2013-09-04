DROP DATABASE Patient_Management;
create database patient_management;
use patient_management;
set session time_zone = '+3:00';

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
  PatientID INT NOT NULL,
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
  MedicineID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  PainID INT NOT NULL,
  DateTime DATETIME,
  Opioids TINYTEXT,
  Dose TINYTEXT,
  Frequency TINYTEXT,
  RouteOfAddmission TINYTEXT,
  SideEffects TEXT,
  Comments TEXT,
  FOREIGN KEY (PainID) REFERENCES Pain(PainID)
);

CREATE TABLE PainManagement (
  PainManagementID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  PainID INT NOT NULL,
  DateTime DATETIME,
  LocationOfPain TINYTEXT,
  TypeOfPain ENUM ('Somatic', 'Visceral', 'Neuropathic', 'Mixed'),
  Intensity TINYINT,
  Opioids TINYTEXT,
  InfoOtherMed TINYTEXT,
  SideEffects ENUM ('Anxiety', 'Confusion', 'Constipation', 'Epigastric Distress', 'Hallucinations', 'Increased Sedation', 'Motor Weakness', 'Nausea', 'Pruritus', 'Urinary Retention', 'Vomiting'),
  Comments TEXT,
  FOREIGN KEY (PainID) REFERENCES Pain(PainID)
);

-- Patient has many Pains. Pain is treated by many Medicine.
