// $sheet->mergeCells('L24:L25');
        // $sheet->setCellValue('L24', 'CODE DEFECT')->getStyle('L24:L25')->applyFromArray($kontenwraptext)->getAlignment()->setWrapText(true);
        // $sheet->mergeCells('M24:Q25');
        // $sheet->setCellValue('M24', 'DEFECT DESCRIPTION')->getStyle('M24:Q25')->applyFromArray($kontenwraptext);
        // $sheet->mergeCells('R24:R25');
        // $sheet->setCellValue('R24', '')->getStyle('R24:R25')->applyFromArray($kontenwraptext);
        // $sheet->setCellValue('S24', 'MINOR DEFECT')->getStyle('S24')->applyFromArray($kontenwraptext)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('S25', '2,5')->getStyle('S25')->applyFromArray($kontenwraptext);
        // $sheet->setCellValue('T24', 'MAJOR DEFECT')->getStyle('T24')->applyFromArray($kontenwraptext)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('T25', '1,5')->getStyle('T25')->applyFromArray($kontenwraptext);
        // $sheet->setCellValue('U24', 'CRITICAL DEFECT')->getStyle('U24')->applyFromArray($kontenwraptext)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('U25', '0,0')->getStyle('U25')->applyFromArray($kontenwraptext);

        $sheet->setCellValue('L26', '400')->getStyle('L26')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M26:Q26');
        $sheet->setCellValue('M26', 'BOTTOM AND STOCKFITTING (attaching midsole and components to outsole)')->getStyle('M26:Q26')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R26', '')->getStyle('R26')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('S26', '')->getStyle('S26')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T26', '')->getStyle('T26')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U26', '')->getStyle('U26')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('L27', '400,08')->getStyle('L27')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M27:Q27');
        $sheet->setCellValue('M27', 'VISIBLE FILM / BLOOMING ON RUBBER')->getStyle('M27:Q27')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R27', '')->getStyle('R27')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('S27', '')->getStyle('S27')->applyFromArray($arsir);
        $sheet->setCellValue('T27', '')->getStyle('T27')->applyFromArray($arsir);
        $sheet->setCellValue('U27', '')->getStyle('U27')->applyFromArray($kontenputihleft);

        $sheet->setCellValue('L28', '400,09')->getStyle('L28')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M28:Q28');
        $sheet->setCellValue('M28', 'POOR MID/OUTSOLEQUALITY (UNEVEN TOP LINE, TRIMING, AIR BUBBLES, SCRATCHES,WRINKLES, ETC)')->getStyle('M28:Q28')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R28', '')->getStyle('R28')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('S28', '')->getStyle('S28')->applyFromArray($arsir);
        $sheet->setCellValue('T28', '')->getStyle('T28')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U28', '')->getStyle('U28')->applyFromArray($arsir);

        $sheet->setCellValue('L29', '400,10')->getStyle('L29')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M29:Q29');
        $sheet->setCellValue('M29', 'POOR TREATMENT (PAINTING, LOGO)')->getStyle('M29:Q29')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R29', '')->getStyle('R29')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('S29', '')->getStyle('S29')->applyFromArray($arsir);
        $sheet->setCellValue('T29', '')->getStyle('T29')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U29', '')->getStyle('U29')->applyFromArray($arsir);

        $sheet->setCellValue('L30', '400,11')->getStyle('L30')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M30:Q30');
        $sheet->setCellValue('M30', 'COMPONENT DELAMINATION')->getStyle('M30:Q30')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R30', '<=4mm length and depth')->getStyle('R30')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S30', '')->getStyle('S30')->applyFromArray($arsir);
        $sheet->setCellValue('T30', '')->getStyle('T30')->applyFromArray($arsir);
        $sheet->setCellValue('U30', '')->getStyle('U30')->applyFromArray($kontenputihleft);

        $sheet->setCellValue('L31', '400,12')->getStyle('L31')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M31:Q31');
        $sheet->setCellValue('M31', 'COMPONENT DELAMINATION')->getStyle('M31:Q31')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R31', '<=4mm length and depth')->getStyle('R31')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S31', '')->getStyle('S31')->applyFromArray($arsir);
        $sheet->setCellValue('T31', '')->getStyle('T31')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U31', '')->getStyle('U31')->applyFromArray($arsir);

        $sheet->setCellValue('L32', '400,13')->getStyle('L32')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M32:Q32');
        $sheet->setCellValue('M32', 'MISMATCHING, INCORECT POSITIONING, WRONG SIZES')->getStyle('M32:Q32')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R32', '')->getStyle('R32')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S32', '')->getStyle('S32')->applyFromArray($arsir);
        $sheet->setCellValue('T32', '')->getStyle('T32')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U32', '')->getStyle('U32')->applyFromArray($arsir);

        $sheet->setCellValue('L33', '400,14')->getStyle('L33')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M33:Q33');
        $sheet->setCellValue('M33', 'DIMENSION/HARDNESS OUT OF SPEC')->getStyle('M33:Q33')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R33', '')->getStyle('R33')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S33', '')->getStyle('S33')->applyFromArray($arsir);
        $sheet->setCellValue('T33', '')->getStyle('T33')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U33', '')->getStyle('U33')->applyFromArray($arsir);

        $sheet->setCellValue('L34', '600')->getStyle('L34')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M34:Q34');
        $sheet->setCellValue('M34', 'ASSEMBLING (attaching BOTTOM TO UPPER)')->getStyle('M34:Q34')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R34', '')->getStyle('R34')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S34', '')->getStyle('S34')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T34', '')->getStyle('T34')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U34', '')->getStyle('U34')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('L35', '600,01')->getStyle('L35')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M35:Q35');
        $sheet->setCellValue('M35', 'OFF CENTER / INCORRECT POSITIONING (SOLE LAYING)/LONG OR SHORT OUTSOLE')->getStyle('M35:Q35')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R35', '')->getStyle('R35')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S35', '')->getStyle('S35')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T35', '')->getStyle('T35')->applyFromArray($arsir);
        $sheet->setCellValue('U35', '')->getStyle('U35')->applyFromArray($arsir);

        $sheet->setCellValue('L36', '600,02')->getStyle('L36')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M36:Q36');
        $sheet->setCellValue('M36', 'BONDING GAP ')->getStyle('M36:Q36')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R36', '> 2mm length and depth')->getStyle('R36')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S36', '')->getStyle('S36')->applyFromArray($arsir);
        $sheet->setCellValue('T36', '')->getStyle('T36')->applyFromArray($arsir);
        $sheet->setCellValue('U36', '')->getStyle('U36')->applyFromArray($kontenputihleft);

        $sheet->setCellValue('L37', '600,03')->getStyle('L37')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M37:Q37');
        $sheet->setCellValue('M37', 'BONDING GAP ')->getStyle('M37:Q37')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R37', '<= 2mm length and depth')->getStyle('R37')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S37', '')->getStyle('S37')->applyFromArray($arsir);
        $sheet->setCellValue('T37', '')->getStyle('T37')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U37', '')->getStyle('U37')->applyFromArray($arsir);

        $sheet->setCellValue('L38', '600,04')->getStyle('L38')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M38:Q38');
        $sheet->setCellValue('M38', 'WRONG BOTTOM /UPPER SIZE')->getStyle('M38:Q38')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R38', '')->getStyle('R38')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S38', '')->getStyle('S38')->applyFromArray($arsir);
        $sheet->setCellValue('T38', '')->getStyle('T38')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U38', '')->getStyle('U38')->applyFromArray($arsir);

        $sheet->setCellValue('L39', '600')->getStyle('L39')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M39:Q39');
        $sheet->setCellValue('M39', 'CLEATS AND SPIKES')->getStyle('M39:Q39')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R39', '')->getStyle('R39')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S39', '')->getStyle('S39')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T39', '')->getStyle('T39')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U39', '')->getStyle('U39')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('L40', '600,01')->getStyle('L40')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M40:Q40');
        $sheet->setCellValue('M40', 'WRONG TYPE / WRONG COLOR / WRONG SIZE')->getStyle('M40:Q40')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R40', '')->getStyle('R40')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S40', '')->getStyle('S40')->applyFromArray($arsir);
        $sheet->setCellValue('T40', '')->getStyle('T40')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U40', '')->getStyle('U40')->applyFromArray($arsir);

        $sheet->setCellValue('L41', '600,02')->getStyle('L41')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M41:Q41');
        $sheet->setCellValue('M41', 'MISSING OR DAMAGED')->getStyle('M41:Q41')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R41', '')->getStyle('R41')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S41', '')->getStyle('S41')->applyFromArray($arsir);
        $sheet->setCellValue('T41', '')->getStyle('T41')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U41', '')->getStyle('U41')->applyFromArray($arsir);

        $sheet->setCellValue('L42', '600,03')->getStyle('L42')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M42:Q42');
        $sheet->setCellValue('M42', 'LOOSE OR NOT TIGHTENED')->getStyle('M42:Q42')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R42', '')->getStyle('R42')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S42', '')->getStyle('S42')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T42', '')->getStyle('T42')->applyFromArray($arsir);
        $sheet->setCellValue('U42', '')->getStyle('U42')->applyFromArray($arsir);

        $sheet->setCellValue('L43', '600,04')->getStyle('L43')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M43:Q43');
        $sheet->setCellValue('M43', 'NOT PROPERLY INSERTED (NOT 90 DEGREE ANGLE TO OUTSOLE PLATE OR WRONG DIRECTION)')->getStyle('M43:Q43')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R43', '')->getStyle('R43')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S43', '')->getStyle('S43')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T43', '')->getStyle('T43')->applyFromArray($arsir);
        $sheet->setCellValue('U43', '')->getStyle('U43')->applyFromArray($arsir);

        $sheet->setCellValue('L44', '600,05')->getStyle('L44')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M44:Q44');
        $sheet->setCellValue('M44', 'RECEPTACLE NOT PROPER COUNTERSUNK')->getStyle('M44:Q44')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R44', '')->getStyle('R44')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S44', '')->getStyle('S44')->applyFromArray($arsir);
        $sheet->setCellValue('T44', '')->getStyle('T44')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U44', '')->getStyle('U44')->applyFromArray($arsir);

        $sheet->setCellValue('L45', '600,06')->getStyle('L45')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M45:Q45');
        $sheet->setCellValue('M45', 'RUSTY PARTS')->getStyle('M45:Q45')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R45', '')->getStyle('R45')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S45', '')->getStyle('S45')->applyFromArray($arsir);
        $sheet->setCellValue('T45', '')->getStyle('T45')->applyFromArray($arsir);
        $sheet->setCellValue('U45', '')->getStyle('U45')->applyFromArray($kontenputihleft);

        $sheet->setCellValue('L46', '700')->getStyle('L46')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M46:Q46');
        $sheet->setCellValue('M46', 'BOOST')->getStyle('M46:Q46')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R46', '')->getStyle('R46')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S46', '')->getStyle('S46')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T46', '')->getStyle('T46')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U46', '')->getStyle('U46')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('L47', '700,01')->getStyle('L47')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M47:Q47');
        $sheet->setCellValue('M47', 'UNBLOWN BEAD')->getStyle('M47:Q47')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R47', '')->getStyle('R47')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S47', '')->getStyle('S47')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T47', '')->getStyle('T47')->applyFromArray($arsir);
        $sheet->setCellValue('U47', '')->getStyle('U47')->applyFromArray($arsir);

        $sheet->setCellValue('L48', '700,02')->getStyle('L48')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M48:Q48');
        $sheet->setCellValue('M48', 'SEMI UNBLOWN BEAD')->getStyle('M48:Q48')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R48', 'MAX 1 PER PIECE')->getStyle('R48')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S48', '')->getStyle('S48')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T48', '')->getStyle('T48')->applyFromArray($arsir);
        $sheet->setCellValue('U48', '')->getStyle('U48')->applyFromArray($arsir);

        $sheet->setCellValue('L49', '700,03')->getStyle('L49')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M49:Q49');
        $sheet->setCellValue('M49', 'YELLOWING BEAD BUT NO SIGNIFICANT COLOR DIFFENRENCE')->getStyle('M49:Q49')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R49', 'MAX 1 PER PIECE')->getStyle('R49')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S49', '')->getStyle('S49')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T49', '')->getStyle('T49')->applyFromArray($arsir);
        $sheet->setCellValue('U49', '')->getStyle('U49')->applyFromArray($arsir);

        $sheet->setCellValue('L50', '700,04')->getStyle('L50')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M50:Q50');
        $sheet->setCellValue('M50', 'UNFILLED BEAD FOR NON-COLOR BOOST')->getStyle('M50:Q50')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R50', '<8MM X 6MM X 4MM, MAX 3')->getStyle('R50')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S50', '')->getStyle('S50')->applyFromArray($arsir);
        $sheet->setCellValue('T50', '')->getStyle('T50')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U50', '')->getStyle('U50')->applyFromArray($arsir);

        $sheet->setCellValue('L51', '700,05')->getStyle('L51')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M51:Q51');
        $sheet->setCellValue('M51', 'UNFILLED BEAD FOR COLOR BOOST')->getStyle('M51:Q51')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R51', '<4MM X 3MM X 2MM, MAX 3')->getStyle('R51')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S51', '')->getStyle('S51')->applyFromArray($arsir);
        $sheet->setCellValue('T51', '')->getStyle('T51')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U51', '')->getStyle('U51')->applyFromArray($arsir);

        $sheet->setCellValue('L52', '700,06')->getStyle('L52')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M52:Q52');
        $sheet->setCellValue('M52', 'CONTAMINATION BUT WITHOUT SIGNNIFICANT COLOR DIFFERENCE TO STANDARD BOOST COLOR')->getStyle('M52:Q52')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R52', 'MAX 1')->getStyle('R52')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S52', '')->getStyle('S52')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T52', '')->getStyle('T52')->applyFromArray($arsir);
        $sheet->setCellValue('U52', '')->getStyle('U52')->applyFromArray($arsir);

        $sheet->setCellValue('L53', '800')->getStyle('L53')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M53:Q53');
        $sheet->setCellValue('M53', 'VULCANIZED / vulcanized "look"')->getStyle('M53:Q53')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R53', '')->getStyle('R53')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S53', '')->getStyle('S53')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T53', '')->getStyle('T53')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U53', '')->getStyle('U53')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('L54', '800,01')->getStyle('L54')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M54:Q54');
        $sheet->setCellValue('M54', 'YELLOWISH ON FOXING EDGE')->getStyle('M54:Q54')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R54', '')->getStyle('R54')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S54', '')->getStyle('S54')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T54', '')->getStyle('T54')->applyFromArray($arsir);
        $sheet->setCellValue('U54', '')->getStyle('U54')->applyFromArray($arsir);

        $sheet->setCellValue('L55', '800,02')->getStyle('L55')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M55:Q55');
        $sheet->setCellValue('M55', 'OVER CEMENT ON QUARTER/COLLAR LINING (AFTER VULCANIZING)')->getStyle('M55:Q55')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R55', '')->getStyle('R55')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S55', '')->getStyle('S55')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T55', '')->getStyle('T55')->applyFromArray($arsir);
        $sheet->setCellValue('U55', '')->getStyle('U55')->applyFromArray($arsir);

        $sheet->setCellValue('L56', '800,03')->getStyle('L56')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M56:Q56');
        $sheet->setCellValue('M56', 'SCRATCHED FOXING')->getStyle('M56:Q56')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R56', '>3MM LENGTH')->getStyle('R56')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S56', '')->getStyle('S56')->applyFromArray($arsir);
        $sheet->setCellValue('T56', '')->getStyle('T56')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U56', '')->getStyle('U56')->applyFromArray($arsir);

        $sheet->setCellValue('L57', '800,04')->getStyle('L57')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M57:Q57');
        $sheet->setCellValue('M57', 'UNSMOOTH FOXING (AIR BUBBLES INSIDE)')->getStyle('M57:Q57')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R57', '')->getStyle('R57')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S57', '')->getStyle('S57')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T57', '')->getStyle('T57')->applyFromArray($arsir);
        $sheet->setCellValue('U57', '')->getStyle('U57')->applyFromArray($arsir);

        $sheet->setCellValue('L58', '800,05')->getStyle('L58')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M58:Q58');
        $sheet->setCellValue('M58', 'OVERLAPPED FOXING CONNECTION')->getStyle('M58:Q58')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R58', '')->getStyle('R58')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S58', '')->getStyle('S58')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T58', '')->getStyle('T58')->applyFromArray($arsir);
        $sheet->setCellValue('U58', '')->getStyle('U58')->applyFromArray($arsir);

        $sheet->setCellValue('L59', '800,06')->getStyle('L59')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M59:Q59');
        $sheet->setCellValue('M59', 'GAP AT FOXING CONNECTION')->getStyle('M59:Q59')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R59', '')->getStyle('R59')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S59', '')->getStyle('S59')->applyFromArray($arsir);
        $sheet->setCellValue('T59', '')->getStyle('T59')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U59', '')->getStyle('U59')->applyFromArray($arsir);

        $sheet->setCellValue('L60', '800,07')->getStyle('L60')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M60:Q60');
        $sheet->setCellValue('M60', 'FOXING LABEL ATTACHING OFF CENTER')->getStyle('M60:Q60')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R60', '>3MM')->getStyle('R60')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S60', '')->getStyle('S60')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T60', '')->getStyle('T60')->applyFromArray($arsir);
        $sheet->setCellValue('U60', '')->getStyle('U60')->applyFromArray($arsir);

        $sheet->setCellValue('L61', '800,08')->getStyle('L61')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M61:Q61');
        $sheet->setCellValue('M61', 'POOR FOXING TRIMMING')->getStyle('M61:Q61')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R61', '')->getStyle('R61')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S61', '')->getStyle('S61')->applyFromArray($arsir);
        $sheet->setCellValue('T61', '')->getStyle('T61')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U61', '')->getStyle('U61')->applyFromArray($arsir);
        
        $sheet->setCellValue('L62', '900')->getStyle('L62')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M62:Q62');
        $sheet->setCellValue('M62', 'CARBON 4D')->getStyle('M62:Q62')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R62', '')->getStyle('R62')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S62', '')->getStyle('S62')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T62', '')->getStyle('T62')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U62', '')->getStyle('U62')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('L63', '900,01')->getStyle('L63')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M63:Q63');
        $sheet->setCellValue('M63', 'PRINTED DEFECT AT VISIBLE AREA')->getStyle('M63:Q63')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R63', '')->getStyle('R63')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S63', '')->getStyle('S63')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T63', '')->getStyle('T63')->applyFromArray($arsir);
        $sheet->setCellValue('U63', '')->getStyle('U63')->applyFromArray($arsir);

        $sheet->setCellValue('L64', '900,02')->getStyle('L64')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M64:Q64');
        $sheet->setCellValue('M64', 'BROKEN LATTICE')->getStyle('M64:Q64')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R64', '2 OR MORE')->getStyle('R64')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S64', '')->getStyle('S64')->applyFromArray($arsir);
        $sheet->setCellValue('T64', '')->getStyle('T64')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U64', '')->getStyle('U64')->applyFromArray($arsir);

        $sheet->setCellValue('L65', '900,03')->getStyle('L65')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M65:Q65');
        $sheet->setCellValue('M65', 'SHIFT LINES')->getStyle('M65:Q65')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R65', '')->getStyle('R65')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S65', '')->getStyle('S65')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T65', '')->getStyle('T65')->applyFromArray($arsir);
        $sheet->setCellValue('U65', '')->getStyle('U65')->applyFromArray($arsir);

        $sheet->setCellValue('L66', '900,04')->getStyle('L66')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M66:Q66');
        $sheet->setCellValue('M66', 'EXCESS RESIN')->getStyle('M66:Q66')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R66', 'OUTSIDE FOREFOOT')->getStyle('R66')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S66', '')->getStyle('S66')->applyFromArray($arsir);
        $sheet->setCellValue('T66', '')->getStyle('T66')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U66', '')->getStyle('U66')->applyFromArray($arsir);

        $sheet->setCellValue('L67', '900,05')->getStyle('L67')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M67:Q67');
        $sheet->setCellValue('M67', 'SURFACE FINISH CLUMBS AT VISIBLE AREA')->getStyle('M67:Q67')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R67', '')->getStyle('R67')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S67', '')->getStyle('S67')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T67', '')->getStyle('T67')->applyFromArray($arsir);
        $sheet->setCellValue('U67', '')->getStyle('U67')->applyFromArray($arsir);

        $sheet->setCellValue('L68', '900,06')->getStyle('L68')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M68:Q68');
        $sheet->setCellValue('M68', 'CONTAMINATION')->getStyle('M68:Q68')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R68', '>1MM')->getStyle('R68')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S68', '')->getStyle('S68')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T68', '')->getStyle('T68')->applyFromArray($arsir);
        $sheet->setCellValue('U68', '')->getStyle('U68')->applyFromArray($arsir);

        $sheet->setCellValue('L69', '900,07')->getStyle('L69')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M69:Q69');
        $sheet->setCellValue('M69', 'COLOR DIFFERENCE, MISMATCH')->getStyle('M69:Q69')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R69', '>1MM')->getStyle('R69')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S69', '')->getStyle('S69')->applyFromArray($arsir);
        $sheet->setCellValue('T69', '')->getStyle('T69')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U69', '')->getStyle('U69')->applyFromArray($arsir);

        $sheet->setCellValue('L70', '900,08')->getStyle('L70')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M70:Q70');
        $sheet->setCellValue('M70', 'YELLOWING')->getStyle('M70:Q70')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R70', '')->getStyle('R70')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S70', '')->getStyle('S70')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T70', '')->getStyle('T70')->applyFromArray($arsir);
        $sheet->setCellValue('U70', '')->getStyle('U70')->applyFromArray($arsir);

        $sheet->setCellValue('L71', '1000')->getStyle('L71')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M71:Q71');
        $sheet->setCellValue('M71', 'DIRECT SOLING')->getStyle('M71:Q71')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R71', '')->getStyle('R71')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S71', '')->getStyle('S71')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T71', '')->getStyle('T71')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U71', '')->getStyle('U71')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('L72', '1000,01')->getStyle('L72')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M72:Q72');
        $sheet->setCellValue('M72', 'DOUBLE SKIN')->getStyle('M72:Q72')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R72', '')->getStyle('R72')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S72', '')->getStyle('S72')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T72', '')->getStyle('T72')->applyFromArray($arsir);
        $sheet->setCellValue('U72', '')->getStyle('U72')->applyFromArray($arsir);

        $sheet->setCellValue('L73', '1000,02')->getStyle('L73')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M73:Q73');
        $sheet->setCellValue('M73', 'DOUBLE PRESSING LINE ON OUTSOLE')->getStyle('M73:Q73')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R73', '')->getStyle('R73')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S73', '')->getStyle('S73')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T73', '')->getStyle('T73')->applyFromArray($arsir);
        $sheet->setCellValue('U73', '')->getStyle('U73')->applyFromArray($arsir);

        $sheet->setCellValue('L74', '1000,03')->getStyle('L74')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M74:Q74');
        $sheet->setCellValue('M74', 'PU OVER-FLOW TO OUTSOLE')->getStyle('M74:Q74')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R74', '')->getStyle('R74')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S74', '')->getStyle('S74')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T74', '')->getStyle('T74')->applyFromArray($arsir);
        $sheet->setCellValue('U74', '')->getStyle('U74')->applyFromArray($arsir);

        $sheet->setCellValue('L75', '1000,04')->getStyle('L75')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M75:Q75');
        $sheet->setCellValue('M75', 'AIR BUBBLE')->getStyle('M75:Q75')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R75', '>1MM')->getStyle('R75')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S75', '')->getStyle('S75')->applyFromArray($arsir);
        $sheet->setCellValue('T75', '')->getStyle('T75')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U75', '')->getStyle('U75')->applyFromArray($arsir);

        $sheet->setCellValue('L76', '1000,05')->getStyle('L76')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M76:Q76');
        $sheet->setCellValue('M76', 'UN-FILLED TPU')->getStyle('M76:Q76')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R76', '>8 DOTS/INCH2')->getStyle('R76')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S76', '')->getStyle('S76')->applyFromArray($arsir);
        $sheet->setCellValue('T76', '')->getStyle('T76')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U76', '')->getStyle('U76')->applyFromArray($arsir);

        $sheet->setCellValue('L77', '1000,06')->getStyle('L77')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M77:Q77');
        $sheet->setCellValue('M77', 'PU OVER-FLOW TO INSOLE BOARD (NOT COVERED BY SOCKLINER)')->getStyle('M77:Q77')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R77', '')->getStyle('R77')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S77', '')->getStyle('S77')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T77', '')->getStyle('T77')->applyFromArray($arsir);
        $sheet->setCellValue('U77', '')->getStyle('U77')->applyFromArray($arsir);

        $sheet->setCellValue('L78', '1000,07')->getStyle('L78')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M78:Q78');
        $sheet->setCellValue('M78', 'POOR PARTING LINE TRIMMING ')->getStyle('M78:Q78')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R78', '>1MM')->getStyle('R78')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S78', '')->getStyle('S78')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T78', '')->getStyle('T78')->applyFromArray($arsir);
        $sheet->setCellValue('U78', '')->getStyle('U78')->applyFromArray($arsir);

        $sheet->setCellValue('L79', '1000,08')->getStyle('L79')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M79:Q79');
        $sheet->setCellValue('M79', 'UPPER PINCHING/DAMAGE')->getStyle('M79:Q79')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R79', 'BROKEN')->getStyle('R79')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S79', '')->getStyle('S79')->applyFromArray($arsir);
        $sheet->setCellValue('T79', '')->getStyle('T79')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U79', '')->getStyle('U79')->applyFromArray($arsir);

        $sheet->setCellValue('L80', '1000,09')->getStyle('L80')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M80:Q80');
        $sheet->setCellValue('M80', 'RELEASE AGENT MARKING AT VISIBLE AREA [CONTAMINATION]')->getStyle('M80:Q80')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R80', '')->getStyle('R80')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S80', '')->getStyle('S80')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T80', '')->getStyle('T80')->applyFromArray($arsir);
        $sheet->setCellValue('U80', '')->getStyle('U80')->applyFromArray($arsir);

        $sheet->setCellValue('L81', '1000,10')->getStyle('L81')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M81:Q81');
        $sheet->setCellValue('M81', 'PU OVER-FLOW TO UPPER')->getStyle('M81:Q81')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R81', '>1MM')->getStyle('R81')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S81', '')->getStyle('S81')->applyFromArray($arsir);
        $sheet->setCellValue('T81', '')->getStyle('T81')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U81', '')->getStyle('U81')->applyFromArray($arsir);

        $sheet->setCellValue('L82', '1000,11')->getStyle('L82')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M82:Q82');
        $sheet->setCellValue('M82', 'MERGED UPPER TO PU MIDSOLE')->getStyle('M82:Q82')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R82', '>1MM')->getStyle('R82')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S82', '')->getStyle('S82')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T82', '')->getStyle('T82')->applyFromArray($arsir);
        $sheet->setCellValue('U82', '')->getStyle('U82')->applyFromArray($arsir);

        $sheet->setCellValue('L83', '1000,12')->getStyle('L83')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M83:Q83');
        $sheet->setCellValue('M83', 'FLOW MARKING')->getStyle('M83:Q83')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R83', 'CLEARY VISIBLE')->getStyle('R83')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S83', '')->getStyle('S83')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T83', '')->getStyle('T83')->applyFromArray($arsir);
        $sheet->setCellValue('U83', '')->getStyle('U83')->applyFromArray($arsir);

        $sheet->setCellValue('L84', '1000,13')->getStyle('L84')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M84:Q84');
        $sheet->setCellValue('M84', 'HIGH/LOW BACK')->getStyle('M84:Q84')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R84', '')->getStyle('R84')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S84', '')->getStyle('S84')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T84', '')->getStyle('T84')->applyFromArray($arsir);
        $sheet->setCellValue('U84', '')->getStyle('U84')->applyFromArray($arsir);

        $sheet->setCellValue('L85', '1000,14')->getStyle('L85')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M85:Q85');
        $sheet->setCellValue('M85', 'BONDING GAP PU & TPU')->getStyle('M85:Q85')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R85', '')->getStyle('R85')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S85', '')->getStyle('S85')->applyFromArray($arsir);
        $sheet->setCellValue('T85', '')->getStyle('T85')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U85', '')->getStyle('U85')->applyFromArray($arsir);

        $sheet->setCellValue('L86', '1000,15')->getStyle('L86')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M86:Q86');
        $sheet->setCellValue('M86', 'DAMANGED PU/TPU')->getStyle('M86:Q86')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R86', '')->getStyle('R86')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S86', '')->getStyle('S86')->applyFromArray($arsir);
        $sheet->setCellValue('T86', '')->getStyle('T86')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U86', '')->getStyle('U86')->applyFromArray($arsir);

        $sheet->setCellValue('L87', '1000,16')->getStyle('L87')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M87:Q87');
        $sheet->setCellValue('M87', 'TORN MATERIAL')->getStyle('M87:Q87')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R87', '')->getStyle('R87')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S87', '')->getStyle('S87')->applyFromArray($arsir);
        $sheet->setCellValue('T87', '')->getStyle('T87')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U87', '')->getStyle('U87')->applyFromArray($arsir);

        $sheet->setCellValue('L88', '1100')->getStyle('L88')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M88:Q88');
        $sheet->setCellValue('M88', 'SLIDES/SANDALS')->getStyle('M88:Q88')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R88', '')->getStyle('R88')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S88', '')->getStyle('S88')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T88', '')->getStyle('T88')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U88', '')->getStyle('U88')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('L89', '1100,01')->getStyle('L89')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M89:Q89');
        $sheet->setCellValue('M89', 'DIFFERENT FOOTBED LENGTH')->getStyle('M89:Q89')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R89', '<= 3MM')->getStyle('R89')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S89', '')->getStyle('S89')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T89', '')->getStyle('T89')->applyFromArray($arsir);
        $sheet->setCellValue('U89', '')->getStyle('U89')->applyFromArray($arsir);

        $sheet->setCellValue('L90', '1100,02')->getStyle('L90')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M90:Q90');
        $sheet->setCellValue('M90', 'DIFFERENT TOE/HEEL SPRING')->getStyle('M90:Q90')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R90', '>=3MM')->getStyle('R90')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S90', '')->getStyle('S90')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T90', '')->getStyle('T90')->applyFromArray($arsir);
        $sheet->setCellValue('U90', '')->getStyle('U90')->applyFromArray($arsir);

        $sheet->setCellValue('L91', '1100,03')->getStyle('L91')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M91:Q91');
        $sheet->setCellValue('M91', 'OFF HEIGHT/WIDTH BETWEEN LEFT AND RIGH THONG/FLIP-FLOP')->getStyle('M91:Q91')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R91', '>=3MM')->getStyle('R91')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S91', '')->getStyle('S91')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T91', '')->getStyle('T91')->applyFromArray($arsir);
        $sheet->setCellValue('U91', '')->getStyle('U91')->applyFromArray($arsir);

        $sheet->setCellValue('L92', '1100,04')->getStyle('L92')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M92:Q92');
        $sheet->setCellValue('M92', 'OUTSOLE SUNKEN/COLLAPSING')->getStyle('M92:Q92')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R92', '')->getStyle('R92')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S92', '')->getStyle('S92')->applyFromArray($arsir);
        $sheet->setCellValue('T92', '')->getStyle('T92')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U92', '')->getStyle('U92')->applyFromArray($arsir);

        $sheet->setCellValue('L93', '1200')->getStyle('L93')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M93:Q93');
        $sheet->setCellValue('M93', 'KNITTING UPPER')->getStyle('M93:Q93')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R93', '')->getStyle('R93')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S93', '')->getStyle('S93')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T93', '')->getStyle('T93')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U93', '')->getStyle('U93')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('L94', '1200,01')->getStyle('L94')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M94:Q94');
        $sheet->setCellValue('M94', 'FRAYING OUT')->getStyle('M94:Q94')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R94', '')->getStyle('R94')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S94', '')->getStyle('S94')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T94', '')->getStyle('T94')->applyFromArray($arsir);
        $sheet->setCellValue('U94', '')->getStyle('U94')->applyFromArray($arsir);

        $sheet->setCellValue('L95', '1200,02')->getStyle('L95')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M95:Q95');
        $sheet->setCellValue('M95', 'BROKEN')->getStyle('M95:Q95')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R95', '')->getStyle('R95')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S95', '')->getStyle('S95')->applyFromArray($arsir);
        $sheet->setCellValue('T95', '')->getStyle('T95')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U95', '')->getStyle('U95')->applyFromArray($arsir);

        $sheet->setCellValue('L96', '1200,03')->getStyle('L96')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M96:Q96');
        $sheet->setCellValue('M96', 'HOT MELT YARN ACCUMULATES INTO GRANULES')->getStyle('M96:Q96')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R96', '')->getStyle('R96')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S96', '')->getStyle('S96')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T96', '')->getStyle('T96')->applyFromArray($arsir);
        $sheet->setCellValue('U96', '')->getStyle('U96')->applyFromArray($arsir);

        $sheet->setCellValue('L97', '1200,04')->getStyle('L97')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M97:Q97');
        $sheet->setCellValue('M97', 'UPPER PATTERN NOT SYMMETRY BETWEEN LEFT & RIGHT SHOE')->getStyle('M97:Q97')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R97', '')->getStyle('R97')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S97', '')->getStyle('S97')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T97', '')->getStyle('T97')->applyFromArray($arsir);
        $sheet->setCellValue('U97', '')->getStyle('U97')->applyFromArray($arsir);

        $sheet->setCellValue('L98', '1300')->getStyle('L98')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M98:Q98');
        $sheet->setCellValue('M98', 'NO SEW')->getStyle('M98:Q98')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R98', '')->getStyle('R98')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S98', '')->getStyle('S98')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T98', '')->getStyle('T98')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U98', '')->getStyle('U98')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('L99', '1300,01')->getStyle('L99')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M99:Q99');
        $sheet->setCellValue('M99', 'DELAMINATION/PEEL OFF/CRACKING ON PRINTING')->getStyle('M99:Q99')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R99', '')->getStyle('R99')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S99', '')->getStyle('S99')->applyFromArray($arsir);
        $sheet->setCellValue('T99', '')->getStyle('T99')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U99', '')->getStyle('U99')->applyFromArray($arsir);

        $sheet->setCellValue('L100', '1300,02')->getStyle('L100')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M100:Q100');
        $sheet->setCellValue('M100', 'OVERFLOWING CEMENT')->getStyle('M100:Q100')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R100', '>0.5MM')->getStyle('R100')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S100', '')->getStyle('S100')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T100', '')->getStyle('T100')->applyFromArray($arsir);
        $sheet->setCellValue('U100', '')->getStyle('U100')->applyFromArray($arsir);

        $sheet->setCellValue('L101', '1300,03')->getStyle('L101')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M101:Q101');
        $sheet->setCellValue('M101', 'NOT SYMMETRY BETWEEN LEFT & RIGHT SHOE')->getStyle('M101:Q101')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R101', '')->getStyle('R101')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S101', '')->getStyle('S101')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T101', '')->getStyle('T101')->applyFromArray($arsir);
        $sheet->setCellValue('U101', '')->getStyle('U101')->applyFromArray($arsir);

        $sheet->setCellValue('L102', '1300,04')->getStyle('L102')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M102:Q102');
        $sheet->setCellValue('M102', 'YELLOWING/WHITENING')->getStyle('M102:Q102')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R102', '')->getStyle('R102')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S102', '')->getStyle('S102')->applyFromArray($arsir);
        $sheet->setCellValue('T102', '')->getStyle('T102')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U102', '')->getStyle('U102')->applyFromArray($arsir);

        $sheet->setCellValue('L103', '1300,05')->getStyle('L103')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M103:Q103');
        $sheet->setCellValue('M103', 'COLOR DIFFERENT')->getStyle('M103:Q103')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R103', '')->getStyle('R103')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S103', '')->getStyle('S103')->applyFromArray($arsir);
        $sheet->setCellValue('T103', '')->getStyle('T103')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U103', '')->getStyle('U103')->applyFromArray($arsir);

        $sheet->setCellValue('L104', '1300,06')->getStyle('L104')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M104:Q104');
        $sheet->setCellValue('M104', 'BURN NO SEW')->getStyle('M104:Q104')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R104', '')->getStyle('R104')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S104', '')->getStyle('S104')->applyFromArray($arsir);
        $sheet->setCellValue('T104', '')->getStyle('T104')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('U104', '')->getStyle('U104')->applyFromArray($arsir);

        $sheet->setCellValue('L105', '1300,07')->getStyle('L105')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M105:Q105');
        $sheet->setCellValue('M105', 'WRONG PRESSING POSITION/PRESSING MARKED')->getStyle('M105:Q105')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R105', '')->getStyle('R105')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S105', '')->getStyle('S105')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('T105', '')->getStyle('T105')->applyFromArray($arsir);
        $sheet->setCellValue('U105', '')->getStyle('U105')->applyFromArray($arsir);

        



