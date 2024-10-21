const convertFormInfoApiResult = (result) => {
    const [
        id,
        facultyName,
        departmentName,
        disciplineName,
        degreeName,
        fielfOfStudyName,
        specialtyName,
        educationalProgram,
        docApprovedByPosition,
        docApprovedByName,
        created_at
    ] = result;

    return {
        id,
        facultyName,
        departmentName,
        disciplineName,
        degreeName,
        fielfOfStudyName,
        specialtyName,
        educationalProgram,
        docApprovedByPosition,
        docApprovedByName,
        created_at
    };
}