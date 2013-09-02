use patient_management;

INSERT INTO Patient VALUES (
  "1",
  "abdallah",
  "1980-02-25",
  "male",
  "indian",
  "2012-04-12",
  "heart attack",
  "heart transplant",
  "poor man"
);

INSERT INTO Pain (
  PainID,
  PatientID,
  LocationOfPain,
  Pattern,
  Intensity,
  AtThisMoment,
  CharacterOfPain,
  Radiation,
  TypeOfPain,
  MedicationPlan
) VALUES (
  "1",
  "1",
  "arm",
  "Constant",
  1,
  "Best",
  "Shooting",
  b'1',
  "Mixed",
  "plan: blah bleh bloh"
);

INSERT INTO Medicine VALUES (
  "1",
  "1",
  "2012-09-23",
  "drug111",
  "100 g",
  "twice a day",
  "oral",
  "headache",
  "blah blah"
);

INSERT INTO PainManagement VALUES (
  "1",
  "1",
  "2012-09-23",
  "neck",
  "Somatic",
  "23",
  "medicine blah",
  "info about another med",
  "Anxiety",
  "blah blah"
);
